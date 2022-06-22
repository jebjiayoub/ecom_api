<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => $this->faker->text(1000),
            'price' => $this->faker->randomFloat(2, 10, 10000),
            'category_id' => Category::select('id')->inRandomOrder()->first()->id
        ];
    }
}
