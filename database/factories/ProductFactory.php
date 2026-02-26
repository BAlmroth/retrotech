<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\Condition;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $consoles = [
            ['name' => 'Nintendo DS', 'brand' => 'Nintendo'],
            ['name' => 'Nintendo Wii', 'brand' => 'Nintendo'],
            ['name' => 'Nintendo Switch', 'brand' => 'Nintendo'],

            ['name' => 'PlayStation 1', 'brand' => 'Sony'],
            ['name' => 'PlayStation 2', 'brand' => 'Sony'],
            ['name' => 'PlayStation 3', 'brand' => 'Sony'],

            ['name' => 'Xbox', 'brand' => 'Microsoft'],
            ['name' => 'Xbox 360', 'brand' => 'Microsoft'],

            ['name' => 'Sega Mega Drive', 'brand' => 'Sega'],
            ['name' => 'Sega Dreamcast', 'brand' => 'Sega'],
        ];

        $console = fake()->randomElement($consoles);

        $brand = Brand::where('name', $console['brand'])->first();

        return [
            'name' => $console['name'],
            'brand_id' => $brand->id,
            'condition_id' => fake()->randomElement(Condition::pluck('id')),
            'description' => fake()->sentence(),
            'in_stock' => fake()->boolean(),
            'price' => fake()->numberBetween(500, 4000),
        ];
    }
}
