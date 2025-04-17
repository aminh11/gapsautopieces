<?php

namespace App\Livewire;

use App\Models\Auction;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Page Encheres - GAPS')]

class EncheresPages extends Component
{
    use WithPagination;

    public function render()
    {
        // Get active auctions
        $activeAuctions = Auction::where('is_active', true)
        ->where('status', 'active')
        // ->where('start_date', '<=', now())
        // ->where('end_date', '>=', now())
        ->with(['product', 'bids.user'])
        ->paginate(8);

        // Get upcoming auctions
        $upcomingAuctions = Auction::where('is_active', true)
            ->where('status', 'pending')
            ->where('start_date', '>', now())
            ->with(['product'])
            ->take(4)
            ->get();

        return view('livewire.encheres-pages', [
            'auctions' => $activeAuctions,
            'upcomingAuctions' => $upcomingAuctions,
        ]);
    }
}