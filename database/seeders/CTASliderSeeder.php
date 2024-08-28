<?php

namespace Database\Seeders;

use App\Models\CtaSection;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CTASliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'image' => 'customer\assets\imgs\banner\service-banner-1.webp',
                'small_text' => 'New Collection',
                'main_text' => 'Spring 2024 Arrivals',
                'button_text' => 'Shop Now',
                'button_color' => '#fff2e5', // Example color in hex
                'button_link' => 'http://127.0.0.1:8000',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'customer\assets\imgs\banner\service-banner-1.webp',
                'small_text' => 'Exclusive Offer',
                'main_text' => '50% Off on All Products',
                'button_text' => 'Grab Deal',
                'button_color' => '#cdd4f8', // Example color in hex
                'button_link' => 'http://127.0.0.1:8000',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($sections as $section) {
            CtaSection::updateOrCreate(
                [
                    'image' => $section['image'],
                    'main_text' => $section['main_text'],
                ], // Unique attribute for update or create
                [
                    'small_text' => $section['small_text'],
                    'button_text' => $section['button_text'],
                    'button_color' => $section['button_color'],
                    'button_link' => $section['button_link'],
                    'status' => $section['status'],
                    'created_at' => $section['created_at'],
                    'updated_at' => $section['updated_at'],
                ]
            );
        }
    }
}
