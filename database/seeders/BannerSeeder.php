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
                'small_text' => 'Offer Available',
                'main_black_text' => 'For First Booking',
                'main_color_text' => 'On Every Services',
                'text_color' => '#0776c7',
                'offer_text' => 'Save more with coupons & up to 20% off',
                'button_text' => 'Book Now',
                'button_color' => '#0776c7',
                'button_link' => 'https://example.com/summer-sale',
                'status' => 1,
            ],
        ];
        foreach ($banners as $banner) {
            BannerSlider::updateOrCreate(
                [
                    'image' => $banner['image'],
                    'offer_text' => $banner['offer_text'],
                ],
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
