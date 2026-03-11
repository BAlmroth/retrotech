<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands=[
            'Sony',
            'Nintendo',
            'Microsoft',
            'Atari',
            'Sega',
            'Ubisoft'
        ];

        foreach($brands as $brand){
            Brand::create([
            'name' => $brand    
            ]);
        }
    }
}
