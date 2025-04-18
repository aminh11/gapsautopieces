<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    // Ajouter un article au panier (1 par défaut)
    static public function addItemToCart($pieceoccassion_id)
    {
        $cart_items = self::getCartItemsFromCookie();
        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $pieceoccassion_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {
            $pieceoccassion = Product::where('id', $pieceoccassion_id)->first(['id', 'name', 'price', 'images']);
            if ($pieceoccassion) {
                $cart_items[] = [
                    'product_id' => $pieceoccassion_id,
                    'name' => $pieceoccassion->name,
                    'image' => $pieceoccassion->images[0],
                    'quantity' => 1,
                    'unit_amount' => $pieceoccassion->price,
                    'total_amount' => $pieceoccassion->price,
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // Ajouter un article avec quantité spécifique 
    static public function addItemToCartwithQty($pieceoccassion_id, $qty = 1)
    {
        $cart_items = self::getCartItemsFromCookie();
        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $pieceoccassion_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity'] = $qty;
            $cart_items[$existing_item]['total_amount'] = $qty * $cart_items[$existing_item]['unit_amount'];
        } else {
            $pieceoccassion = Product::where('id', $pieceoccassion_id)->first(['id', 'name', 'price', 'images']);
            if ($pieceoccassion) {
                $cart_items[] = [
                    'product_id' => $pieceoccassion_id,
                    'name' => $pieceoccassion->name,
                    'image' => $pieceoccassion->images[0],
                    'quantity' => $qty,
                    'unit_amount' => $pieceoccassion->price,
                    'total_amount' => $qty * $pieceoccassion->price,
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // Supprimer un article du panier
    static public function removeCartItem($pieceoccassion_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $pieceoccassion_id) {
                unset($cart_items[$key]);
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // Incrémenter la quantité
    static public function incrementQuantityToCartItem($pieceoccassion_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $pieceoccassion_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // Décrémenter la quantité
    static public function decrementQuantityToCartItem($pieceoccassion_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $pieceoccassion_id && $cart_items[$key]['quantity'] > 1) {
                $cart_items[$key]['quantity']--;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // Vider le panier
    static public function clearCartItems()
    {
        Cookie::queue(Cookie::forget('cart_items'));
    }

    // Ajouter le panier dans un cookie (30 jours)
    static public function addCartItemsToCookie($cart_items)
    {
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }

    // Récupérer les articles du panier
    static public function getCartItemsFromCookie()
    {
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        return $cart_items ?? [];
    }

    // Calculer le total général
    static public function calculateGrandTotal($items)
    {
        return array_sum(array_column($items, 'total_amount'));
    }
}
