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
            'Used - Like New',
            'Used - Good',
            'Used - Acceptable',
            'For Parts or Not Working'
        ];

        foreach($conditions as $condition){
            Condition::create([
                'name' => $condition
            ]);
        }
    }
}
