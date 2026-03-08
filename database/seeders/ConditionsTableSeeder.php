<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conditions=[
            'New',
            'Like New',
            'Good',
            'Acceptable',
            'For Parts'
        ];

        foreach($conditions as $condition){
            Condition::create([
                'name' => $condition
            ]);
        }
    }
}
