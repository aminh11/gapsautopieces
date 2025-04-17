<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionBid extends Model
{
    use HasFactory;

    protected $fillable = [
        'auction_id',
        'user_id',
        'amount',
        'is_winning'
    ];

    protected $casts = [
        'is_winning' => 'boolean',
    ];

    // Relationship with Auction
    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}