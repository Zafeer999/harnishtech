<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderItems = [
            [
                'id' => 1,
                'order_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 3,
                'amount' => 1000.00,
            ],
            [
                'id' => 2,
                'order_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 5,
                'amount' => 1000.00,
            ],
            [
                'id' => 3,
                'order_id' => 2,
                'category_id' => 8,
                'sub_category_id' => 10,
                'amount' => 1000.00,
            ],
            [
                'id' => 4,
                'order_id' => 2,
                'category_id' => 8,
                'sub_category_id' => 12,
                'amount' => 1000.00,
            ],
        ];

        foreach ($orderItems as $item) {
            OrderItem::updateOrCreate(
                ['id' => $item['id']], // Matching criteria
                $item // Data to insert or update
            );
        }
    }
}
