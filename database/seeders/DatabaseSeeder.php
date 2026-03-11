<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@retrotech.se',
            'password' => Hash::make('123'),
        ]);
       
        $this->call(BrandsTableSeeder::class);
        $this->call(ConditionsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

    }
}
