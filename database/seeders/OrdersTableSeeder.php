<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure there are users to associate with orders
        if (User::count() == 0) {
            $this->command->info('No users found, creating dummy users.');
            User::factory()->count(10)->create();
        }

        // Create dummy orders
        Order::factory()->count(20)->create();
    }
}