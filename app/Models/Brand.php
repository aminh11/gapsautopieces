<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\OrderItem;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'category_id',
        'brand_id',
        'name',
        'slug',
        'images',
        'description',
        'price',
        'is_active',
        'is_featured',
        'in_stock',
        'on_sale',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand() 
    {
        return $this->belongsTo(Brand::class); 
    }

    public function orderItems() 
    {
        return $this->hasMany(OrderItem::class);
    }
}

