<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => 'Fadhlan Zakiyyan',
                'email' => 'fadhlan@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'owner',
                'image' => 'diaz.jpg',
                'address' => 'Cinambo, Bandung, Jawa Barat',
                'phone' => '0889261316',
            ],
            [
                'name' => 'Iqbal Cahya',
                'email' => 'iqbal@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'owner',
                'image' => 'komeng.jpg',
                'address' => 'Kawaluyaan, Bandung, Jawa Barat',
                'phone' => '0898737253',
            ],
            [
                'name' => 'Davi Risnadi ',
                'email' => 'davi@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'admin',
                'image' => 'debruyne.jpg',
                'address' => 'Pasir Koja, Bandung, Jawa Barat',
                'phone' => '0889983246',
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
