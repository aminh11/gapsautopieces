<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'starting_price',
        'current_price',
        'reserve_price',
        'bid_increment',
        'start_date',
        'end_date',
        'is_active',
        'status',
        'winner_id'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }

    public function bids()
    {
        return $this->hasMany(AuctionBid::class);
    }

    public function highestBid()
    {
        return $this->bids()->orderBy('amount', 'desc')->first();
    }

    public function isActive()
    {
        $now = now();
        return $this->is_active &&
               $this->status === 'active' &&
               $now->between($this->start_date, $this->end_date);
    }

    public function hasEnded()
    {
        return now()->isAfter($this->end_date) || $this->status === 'ended';
    }
}
