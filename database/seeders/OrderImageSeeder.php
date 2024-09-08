<?php

namespace Database\Seeders;

use App\Models\OrderImage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderImages = [
            [
                'id' => 1,
                'order_id' => 1,
                'image' => 'https://via.placeholder.com/150/0000FF/808080?Text=Order1', // Online image URL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'order_id' => 2,
                'image' => 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Order2', // Online image URL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'order_id' => 3,
                'image' => 'https://via.placeholder.com/150/00FF00/000000?Text=Order3', // Online image URL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($orderImages as $orderImage) {
            OrderImage::updateOrCreate(
                ['order_id' => $orderImage['order_id'], 'image' => $orderImage['image']], // Unique combination
                $orderImage
            );
        }
    }
}
