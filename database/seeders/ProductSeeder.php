<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Cappucino',
                'category' => 'Cool Coffee',
                'price' => 24000,
                'image' => 'cappucino.jpg'
            ],
            [
                'name' => 'Mocaccino',
                'category' => 'Cool Coffee',
                'price' => 23500,
                'image' => 'mocaccino.jfif'
            ],
            [
                'name' => 'Latte',
                'category' => 'Hot Coffee',
                'price' => 21000,
                'image' => 'latte.jpg'
            ],
        ];

        foreach ($userData as $key => $val) {
            Product::create($val);
        }
    }
}
