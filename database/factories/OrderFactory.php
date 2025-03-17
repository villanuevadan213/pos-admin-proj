<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_number' => $this->faker->unique()->numerify('ORD-#####'),
            'user_id' => User::inRandomOrder()->first()->id,
            'total_amount' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['Pending', 'Processing', 'Completed', 'Cancelled']),
        ];
    }
}