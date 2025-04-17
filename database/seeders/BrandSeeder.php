<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Bosch',
            'Valeo',
            'Continental',
            'Brembo',
            'NGK',
            'Denso',
            'Hella',
            'Magneti Marelli',
            'Delphi',
            'Febi Bilstein',
        ];

        foreach ($brands as $name) {
            Brand::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'is_active' => true,
            ]);
        }
    }
}