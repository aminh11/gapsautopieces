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
    'images', 
    'description', 
    'price', 
    'is_active',
    'is_featured', 
    'in_stock',
    'on_sale', ];

    protected $casts=[
        'images'=>'array',
    ];
    //relation category Model(le produit appartenir à la catégorie)
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //relation brand Model(le produit appartenir à la brand)
    public function brand(){
        return $this->belongsTo(Brand::class);
    } 
    //relation order Model(le produit appartenir à la commande produits)
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }     
}

