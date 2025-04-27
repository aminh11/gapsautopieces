<?php

namespace App\Livewire;

use App\Models\Auction;
use App\Models\Carbrand;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;

#[Title('Enchères - GAPS')]
class EncheresPages extends Component
{
    use WithPagination;

    #[Url]
    public $selected_carbrands = [];

    public function render()
    {
        $auctionQuery = Auction::query()
            ->where('is_active', true)
            ->where('status', 'active');

        // filtre sur la marque de voiture
        if (!empty($this->selected_carbrands)) {
            $auctionQuery->whereIn('carbrand_id', $this->selected_carbrands);
        }

        return view('livewire.encheres-pages', [
            'auctions' => $auctionQuery->with(['product', 'bids', 'carbrand'])->paginate(9),
            'carbrands' => Carbrand::orderBy('name')->get(['id', 'name']),
        ]);
    }
}
