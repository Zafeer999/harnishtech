<?php

namespace Database\Seeders;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example cities data for Bhiwandi, Kalyan, and Dombivli
        $cities = [
            ['name' => 'Bhiwandi', 'pincode' => '421302', 'status' => 1],
            ['name' => 'Bhiwandi', 'pincode' => '421305', 'status' => 1],
            ['name' => 'Bhiwandi', 'pincode' => '421308', 'status' => 1],
            ['name' => 'Kalyan', 'pincode' => '421301', 'status' => 1],
            ['name' => 'Kalyan', 'pincode' => '421306', 'status' => 1],
            ['name' => 'Kalyan', 'pincode' => '421307', 'status' => 1],
            ['name' => 'Dombivli', 'pincode' => '421201', 'status' => 1],
            ['name' => 'Dombivli', 'pincode' => '421202', 'status' => 1],
            ['name' => 'Dombivli', 'pincode' => '421203', 'status' => 1],
            ['name' => 'Bhiwandi', 'pincode' => '421301', 'status' => 1],
            ['name' => 'Kalyan', 'pincode' => '421311', 'status' => 1],
            ['name' => 'Dombivli', 'pincode' => '421204', 'status' => 1],
        ];

        foreach ($cities as $city) {
            City::updateOrCreate(
                ['name' => $city['name'], 'pincode' => $city['pincode']], // Unique attributes
                [
                    'status' => $city['status'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'deleted_at' => null,
                ]
            );
        }
    }
}
