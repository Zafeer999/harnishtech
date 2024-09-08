<?php

namespace Database\Seeders;

use App\Models\BannerSlider;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'image' => 'customer\assets\imgs\slider\service-slider-1.png',
                'small_text' => 'Limited Offer',
                'main_black_text' => 'Summer Sale',
                'main_color_text' => 'Up to 50% Off',
                'text_color' => '#cdebbc',
                'offer_text' => 'Use code SUMMER50',
                'button_text' => 'Shop Now',
                'button_color' => '#f6dbf6',
                'button_link' => 'https://example.com/summer-sale',
                'status' => 1,
            ],
            [
                'image' => 'customer\assets\imgs\slider\service-slider-2.webp',
                'small_text' => 'New Arrivals',
                'main_black_text' => 'Winter Collection',
                'main_color_text' => 'Just Arrived',
                'text_color' => '#cdd4f8',
                'offer_text' => 'Check out our latest winter collection',
                'button_text' => 'Explore',
                'button_color' => '#fff2e5',
                'button_link' => 'https://example.com/winter-collection',
                'status' => 1,
            ]
        ];
        foreach ($banners as $banner) {
            BannerSlider::updateOrCreate(
                [
                    'image' => $banner['image'],
                    'offer_text' => $banner['offer_text'],
                ], // Unique attribute for update or create
                [
                    'small_text' => $banner['small_text'],
                    'main_black_text' => $banner['main_black_text'],
                    'main_color_text' => $banner['main_color_text'],
                    'text_color' => $banner['text_color'],
                    'button_text' => $banner['button_text'],
                    'button_color' => $banner['button_color'],
                    'button_link' => $banner['button_link'],
                    'status' => $banner['status'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
