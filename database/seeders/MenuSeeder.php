<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Makanan
        Menu::create([
            'menu' => 'Nasi Goreng',
            'total' => 10000,
            'category_id' => 1,
            'tanggal' => '2022-01-01'
        ]);

        Menu::create([
            'menu' => 'Mie Freno',
            'total' => 15000,
            'category_id' => 1,
            'tanggal' => '2022-01-01'
        ]);

        Menu::create([
            'menu' => 'Nasi Teriyaki',
            'total' => 20000,
            'category_id' => 1,
            'tanggal' => '2022-01-01'
        ]);

        Menu::create([
            'menu' => 'Nasi Ayam Katsu',
            'total' => 15000,
            'category_id' => 1,
            'tanggal' => '2022-01-01'
        ]);

        Menu::create([
            'menu' => 'Nasi Goreng Mawut',
            'total' => 15000,
            'category_id' => 1,
            'tanggal' => '2022-01-01'
        ]);


        //MINUMAN
        Menu::create([
            'menu' => 'Susu Kedelai',
            'total' => 5000,
            'category_id' => 2,
            'tanggal' => '2022-01-01'
        ]);

        Menu::create([
            'menu' => 'Arak Bali',
            'total' => 65000,
            'category_id' => 2,
            'tanggal' => '2022-01-01'
        ]);

        Menu::create([
            'menu' => 'Anggur Merah',
            'total' => 55000,
            'category_id' => 2,
            'tanggal' => '2022-01-01'
        ]);

        Menu::create([
            'menu' => 'Air Putih',
            'total' => 3000,
            'category_id' => 2,
            'tanggal' => '2022-01-01'
        ]);

        Menu::create([
            'menu' => 'Air Zam Zam',
            'total' => 25000,
            'category_id' => 2,
            'tanggal' => '2022-01-01'
        ]);
    }
}
