<?php
namespace Modules\Order\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\app\Models\Order;
use Modules\Product\app\Models\Product;
use Modules\User\app\Models\User;


class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'quantity' => fake()->numberBetween(1, 10),
            'status' => fake()->randomElement(['pending', 'shipped', 'delivered']),
            'total_price' => function (array $attributes) {
                $product = Product::find($attributes['product_id']);
                return $attributes['quantity'] * $product->price;
            },
        ];
    }
}
