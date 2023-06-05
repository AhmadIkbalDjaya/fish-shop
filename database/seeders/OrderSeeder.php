<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'user_id' => 1,
                // 'fishs_id' => [1, 2],
                // 'fishs_id' => '[1, 2]',
                'fishs_id' => json_encode([1, 2]),
                'name' => 'John Doe',
                'phone' => '081234567890',
                'address' => 'Jl. Contoh Alamat 123',
                'payment' => 1,
                'total' => 50000,
                'buy_date' => '2023-05-17',
            ],
            [
                'user_id' => 2,
                'fishs_id' => json_encode([1, 3, 2]),
                'name' => 'Jane Smith',
                'phone' => '081234567891',
                'address' => 'Jl. Contoh Alamat 456',
                'payment' => 2,
                'total' => 75000,
                'buy_date' => '2023-05-18',
            ],
        ];

        // Insert data ke tabel orders
        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
