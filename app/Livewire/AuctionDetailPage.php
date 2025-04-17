<?php

namespace App\Livewire;

use App\Models\Auction;
use App\Models\AuctionBid;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Détail Enchère - GAPS')]
class AuctionDetailPage extends Component
{
    public $auction;
    public $bidAmount;
    public $auctionId;
    
    public function mount($id)
    {
        $this->auctionId = $id;
        $this->loadAuction();
    }
    
    public function loadAuction()
    {
        $this->auction = Auction::with(['product', 'bids.user'])
            ->findOrFail($this->auctionId);
    }
    
    public function placeBid()
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        // Validate bid amount
        $this->validate([
            'bidAmount' => 'required|numeric|min:' . ($this->auction->current_price + $this->auction->bid_increment),
        ], [
            'bidAmount.min' => 'Votre enchère doit être supérieure à ' . ($this->auction->current_price + $this->auction->bid_increment) . ' TND',
        ]);
        
        // Check if auction is still active
        if (!$this->auction->isActive()) {
            LivewireAlert::error('Cette enchère est terminée');
            return;
        }
        
        // Create new bid
        $bid = new AuctionBid();
        $bid->auction_id = $this->auction->id;
        $bid->user_id = auth()->id();
        $bid->amount = $this->bidAmount;
        $bid->is_winning = true;
        $bid->save();
        
        // Update auction current price
        $this->auction->current_price = $this->bidAmount;
        $this->auction->save();
        
        // Set all other bids as not winning
        AuctionBid::where('auction_id', $this->auction->id)
            ->where('id', '!=', $bid->id)
            ->update(['is_winning' => false]);
        
        // Reset bid amount
        $this->reset('bidAmount');
        
        // Reload auction
        $this->loadAuction();
        
        // Show success message
        LivewireAlert::success('Enchère placée avec succès!');
    }
    
    public function render()
    {
        return view('livewire.auction-detail-page');
    }
}