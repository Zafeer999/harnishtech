<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = [
            [
                'name' => 'OFFER30',
                'discount_type' => 'percent', // or 'fixed'
                'discount_value' => 15, // Percentage or fixed amount
                'min_value' => 100, // Minimum order value to use the coupon
                'expiry_date' => Carbon::now()->addDays(15)->format('Y-m-d'), // Expiry date (2 months from now)
                'expiry_count' => 100, // Number of times the coupon can be used
            ],
            [
                'name' => 'Black Friday Deal',
                'discount_type' => 'fixed', // or 'percent'
                'discount_value' => 50, // Fixed amount
                'min_value' => 200, // Minimum order value to use the coupon
                'expiry_date' => Carbon::now()->addDays(10)->format('Y-m-d'), // Expiry date (30 days from now)
                'expiry_count' => 200, // Number of times the coupon can be used
            ],
            [
                'name' => 'Coupon 50-50',
                'discount_type' => 'percent', // or 'fixed'
                'discount_value' => 50, // Percentage or fixed amount
                'min_value' => 100, // Minimum order value to use the coupon
                'expiry_date' => Carbon::now()->addDays(20)->format('Y-m-d'), // Expiry date (2 months from now)
                'expiry_count' => 100, // Number of times the coupon can be used
            ],
            [
                'name' => 'NEW USER',
                'discount_type' => 'fixed', // or 'percent'
                'discount_value' => 50, // Fixed amount
                'min_value' => 200, // Minimum order value to use the coupon
                'expiry_date' => Carbon::now()->addDays(25)->format('Y-m-d'), // Expiry date (30 days from now)
                'expiry_count' => 200, // Number of times the coupon can be used
            ],
            // Add more coupons as needed
        ];

        foreach ($coupons as $coupon) {
            Coupon::updateOrCreate(
                ['name' => $coupon['name']], // Attributes to identify the record
                $coupon // Attributes to update or create
            );
        }
    }
}
