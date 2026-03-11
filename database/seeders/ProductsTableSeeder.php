<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Condition;
use Illuminate\Console\View\Components\Task;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $sony = Brand::where('name', 'Sony')->first();
        $nintendo = Brand::where('name', 'Nintendo')->first();
        $microsoft = Brand::where('name', 'Microsoft')->first();
        $atari = Brand::where('name', 'Atari')->first();
        $sega = Brand::where('name', 'Sega')->first();
        $ubisoft = Brand::where('name', 'Ubisoft')->first();

        $new = Condition::where('name', 'New')->first();
        $likeNew = Condition::where('name', 'Like New')->first();
        $good = Condition::where('name', 'Good')->first();
        $acceptable = Condition::where('name', 'Acceptable')->first();
        $forParts = Condition::where('name', 'For Parts')->first();

        Product::create([
            'name' => 'Nintendo Switch',
            'description' => 'Good',
            'brand_id' => $nintendo->id,
            'condition_id' => $good->id,
            'price' => '400'
        ]);

        Product::create([
            'name' => 'PlayStation 4',
            'description' => 'Good',
            'brand_id' => $sony->id,
            'condition_id' => $likeNew->id,
            'price' => '500'
        ]);

        Product::factory(10)->create();
    }
}