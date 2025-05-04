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
        //Vérifier si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        // Valider le montant de l'enchère
        $this->validate([
            'bidAmount' => 'required|numeric|min:' . ($this->auction->current_price + $this->auction->bid_increment),
        ], [
            'bidAmount.min' => 'Votre enchère doit être supérieure à ' . ($this->auction->current_price + $this->auction->bid_increment) . ' TND',
        ]);
        
        // Vérifiez si l'enchère est toujours active
        if (!$this->auction->isActive()) {
            LivewireAlert::error('Cette enchère est terminée');
            return;
        }
        
        // Créer une nouvelle enchère
        $bid = new AuctionBid();
        $bid->auction_id = $this->auction->id;
        $bid->user_id = auth()->id();
        $bid->amount = $this->bidAmount;
        $bid->is_winning = true;
        $bid->save();
        
        // Mettre à jour le prix actuel des enchères
        $this->auction->current_price = $this->bidAmount;
        $this->auction->save();
        
        // Définir toutes les autres enchères comme non gagnantes
        AuctionBid::where('auction_id', $this->auction->id)
            ->where('id', '!=', $bid->id)
            ->update(['is_winning' => false]);
        
        // Réinitialiser le montant de l'enchère
        $this->reset('bidAmount');
        
        // Recharger les enchères
        $this->loadAuction();
        
        // Afficher le message de réussite
        LivewireAlert::success('Enchère placée avec succès!');
    }
    
    public function render()
    {
        return view('livewire.auction-detail-page');
    }
}