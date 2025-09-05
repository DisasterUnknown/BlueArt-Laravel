<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Seller;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name'     => 'wolf',
            'email'    => 'wolf@gmail.com',
            'password' => Hash::make('wolf12345'),
            'role'     => 'customer',
            'status'   => 'active',
            'OAUTH'    => 'application',
            'pFPdata'  => 'null',
        ]);

        User::factory()->create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
            'role'     => 'admin',
            'status'   => 'active',
            'OAUTH'    => 'application',
            'pFPdata'  => 'null',
        ]);

        User::factory()->create([
            'name'     => 'fox',
            'email'    => 'fox@gmail.com',
            'password' => Hash::make('fox12345'),
            'role'     => 'seller',
            'status'   => 'active',
            'OAUTH'    => 'application',
            'pFPdata'  => 'null',
        ]);

        Seller::create([
            'user_id'   => 3,
            'address'  => '92, Grand Street, Negombo',
            'contact'  => '0775168884',
        ]);
    }
}
