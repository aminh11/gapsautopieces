<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 
    'grand_total', 
    'payment_method', 
    'payment_status', 
    'status', 
    'currency', 
    'shipping_amount', 
    'shipping_method',
    'notes'];
    //relation user Model(la commande appartienne à un utilisateur et un utilisateur peut avoir pleusieurs commandes)
    public function user(){
        return $this->belongsTo(User::class);
    }
    //relation items Model (une commande contienne pleusieurs produits)
    public function items(){
        return $this->hasMany(OrderItem::class);
    } 
    //relation address Model (une commande avoir une seule adresse)
    public function address(){
        return $this->hasOne(Address::class);
    }       
}

