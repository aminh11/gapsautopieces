<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carbrand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Relation : Une marque peut avoir plusieurs produits.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Relation : Une marque peut avoir plusieurs enchères.
     */
    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }
}
