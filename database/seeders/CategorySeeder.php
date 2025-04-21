<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Freinage' => 'Systèmes et pièces de freinage pour véhicules',
            'Moteur' => 'Pièces et composants de moteur',
            'Suspension' => 'Systèmes de suspension et amortisseurs',
            'Transmission' => 'Pièces de transmission et boîtes de vitesses',
            'Électricité' => 'Composants électriques et électroniques',
            'Carrosserie' => 'Pièces de carrosserie et tôlerie',
            'Climatisation' => 'Systèmes de climatisation et chauffage',
            'Éclairage' => 'Phares, feux et systèmes d\'éclairage',
        ];

        foreach ($categories as $name => $description) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'is_active' => true,
            ]);
        }
    }
}