<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = ['category_id', 
    'brand_id', 
    'name', 
    'slug', 
    'image', 
    'description', 
    'price', 
    'is_active',
    'is_feautred', 
    'in_stock', 
    'is_auction',
    'on_sale' ];

    protected $casts=[
        'image'=>'array',
    ];
    //relation category Model(le produit appartenir à la catégorie)
    public function category(){
        return $this->belongsTo(category::class);
    }
    //relation brand Model(le produit appartenir à la brand)
    public function brand(){
        return $this->belongsTo(brand::class);
    } 
    //relation order Model(le produit appartenir à la commande produits)
    public function ordersItems(){
        return $this->belongsTo(OrderItem::class);
    }       
}

