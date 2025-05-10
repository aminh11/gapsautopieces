<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Carbrand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        $brands = Brand::all();
        $carbrand = Carbrand::first(); 

        $products = [
            [
                'name' => 'Disque de frein avant',
                'description' => 'Disque de frein avant haute performance pour une meilleure puissance de freinage.',
                'price' => 89.99,
                'category' => 'Freinage',
                'brand' => 'Brembo',
            ],
            [
                'name' => 'Plaquettes de frein',
                'description' => 'Plaquettes de frein céramique pour une durabilité accrue et moins de poussière.',
                'price' => 45.50,
                'category' => 'Freinage',
                'brand' => 'Bosch',
            ],
            [
                'name' => 'Alternateur reconditionné',
                'description' => 'Alternateur reconditionné avec garantie d\'un an.',
                'price' => 120.00,
                'category' => 'Électricité',
                'brand' => 'Valeo',
            ],
            [
                'name' => 'Démarreur',
                'description' => 'Démarreur compatible avec plusieurs modèles de véhicules.',
                'price' => 95.75,
                'category' => 'Électricité',
                'brand' => 'Bosch',
            ],
            [
                'name' => 'Amortisseur avant',
                'description' => 'Amortisseur avant pour une meilleure tenue de route et confort.',
                'price' => 78.25,
                'category' => 'Suspension',
                'brand' => 'Continental',
            ],
            [
                'name' => 'Kit d\'embrayage',
                'description' => 'Kit d\'embrayage complet incluant disque, mécanisme et butée.',
                'price' => 189.99,
                'category' => 'Transmission',
                'brand' => 'Valeo',
            ],
            [
                'name' => 'Pompe à eau',
                'description' => 'Pompe à eau avec joint d\'étanchéité inclus.',
                'price' => 65.50,
                'category' => 'Moteur',
                'brand' => 'Febi Bilstein',
            ],
            [
                'name' => 'Radiateur de refroidissement',
                'description' => 'Radiateur de refroidissement en aluminium pour une meilleure dissipation 
                thermique.',
                'price' => 110.25,
                'category' => 'Moteur',
                'brand' => 'Hella',
            ],
            [
                'name' => 'Phare avant droit',
                'description' => 'Phare avant droit avec réglage électrique.',
                'price' => 145.00,
                'category' => 'Éclairage',
                'brand' => 'Hella',
            ],
            [
                'name' => 'Compresseur de climatisation',
                'description' => 'Compresseur de climatisation reconditionné avec garantie.',
                'price' => 210.99,
                'category' => 'Climatisation',
                'brand' => 'Denso',
            ],
            [
                'name' => 'Aile avant gauche',
                'description' => 'Aile avant gauche compatible avec plusieurs modèles.',
                'price' => 95.50,
                'category' => 'Carrosserie',
                'brand' => 'Magneti Marelli',
            ],
            [
                'name' => 'Bougie d\'allumage (lot de 4)',
                'description' => 'Lot de 4 bougies d\'allumage haute performance.',
                'price' => 35.99,
                'category' => 'Moteur',
                'brand' => 'NGK',
            ],
        ];

        foreach ($products as $productData) {
            $category = $categories->where('name', $productData['category'])->first();
            $brand = $brands->where('name', $productData['brand'])->first();

            if ($category && $brand && $carbrand) {
                Product::create([
                    'name' => $productData['name'],
                    'slug' => Str::slug($productData['name']),
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'category_id' => $category->id,
                    'brand_id' => $brand->id,
                    'carbrand_id' => $carbrand->id, 
                    'is_active' => true,
                    'is_featured' => rand(0, 1),
                    'in_stock' => true,
                    'on_sale' => rand(0, 1),
                ]);
            }
        }
    }
}
