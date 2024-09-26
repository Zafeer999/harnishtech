<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\OrderItem;
use App\Models\ServiceBoy;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionTableSeeder::class,
            DefaultLoginUserSeeder::class,
            UserSeeder::class,
            UserAddressSeeder::class,
            ServiceBoySeeder::class,
            CategorySubcategorySeeder::class,
            BannerSeeder::class,
            CTASliderSeeder::class,
            CouponSeeder::class,
            CitySeeder::class,
            QuerySeeder::class,
            VisitorSeeder::class,
            TimeSlotSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            AssignedOrderSeeder::class,
            OrderImageSeeder::class,
        ]);
    }
}
