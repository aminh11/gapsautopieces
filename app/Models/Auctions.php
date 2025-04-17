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

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with User (winner)
    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }

    // Relationship with Bids
    public function bids()
    {
        return $this->hasMany(AuctionBid::class);
    }

    // Get the highest bid
    public function highestBid()
    {
        return $this->bids()->orderBy('amount', 'desc')->first();
    }

    // Check if auction is active
    public function isActive()
    {
        $now = now();
        return $this->is_active && 
               $this->status === 'active' && 
               $now->between($this->start_date, $this->end_date);
    }

    // Check if auction has ended
    public function hasEnded()
    {
        return now()->isAfter($this->end_date) || $this->status === 'ended';
    }
}