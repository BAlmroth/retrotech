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
        $likeNew = Condition::where('name', 'Used - Like New')->first();
        $good = Condition::where('name', 'Used - Good')->first();
        $acceptable = Condition::where('name', 'Used - Acceptable')->first();
        $forParts = Condition::where('name', 'For Parts or Not Working')->first();

        Product::create([
            'name' => 'Nintendo Switch',
            'description' => 'Used - Good',
            'brand_id' => $nintendo->id,
            'condition_id' => $good->id,
            'in_stock' => true,
            'price' => '400'
        ]);

        Product::create([
            'name' => 'PlayStation 4',
            'description' => 'Used - Good',
            'brand_id' => $sony->id,
            'condition_id' => $likeNew->id,
            'in_stock' => true
        ]);

        Product::factory(10)->create();
    }
}