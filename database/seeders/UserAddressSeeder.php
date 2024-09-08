<?php

namespace Database\Seeders;

use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            // Dombivli Addresses
            [
                'id' => 1,
                'user_id' => 1,
                'full_address' => '12 River Road, Dombivli, Maharashtra',
                'city' => 'Dombivli',
                'pincode' => '421201',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'full_address' => '78 Ocean Street, Dombivli, Maharashtra',
                'city' => 'Dombivli',
                'pincode' => '421202',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'full_address' => '456 Mountain Avenue, Dombivli, Maharashtra',
                'city' => 'Dombivli',
                'pincode' => '421203',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'full_address' => '789 Palm Street, Dombivli, Maharashtra',
                'city' => 'Dombivli',
                'pincode' => '421204',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'full_address' => '123 Sunlight Road, Dombivli, Maharashtra',
                'city' => 'Dombivli',
                'pincode' => '421205',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'user_id' => 6,
                'full_address' => '67 Maple Street, Dombivli, Maharashtra',
                'city' => 'Dombivli',
                'pincode' => '421206',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Kalyan Addresses
            [
                'id' => 7,
                'user_id' => 7,
                'full_address' => '25 Green Park, Kalyan, Maharashtra',
                'city' => 'Kalyan',
                'pincode' => '421301',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'user_id' => 8,
                'full_address' => '89 Blue Lake Road, Kalyan, Maharashtra',
                'city' => 'Kalyan',
                'pincode' => '421302',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'user_id' => 9,
                'full_address' => '456 Golden Street, Kalyan, Maharashtra',
                'city' => 'Kalyan',
                'pincode' => '421303',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'user_id' => 10,
                'full_address' => '123 River Bend, Kalyan, Maharashtra',
                'city' => 'Kalyan',
                'pincode' => '421304',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'user_id' => 11,
                'full_address' => '67 Moonlight Avenue, Kalyan, Maharashtra',
                'city' => 'Kalyan',
                'pincode' => '421305',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'user_id' => 12,
                'full_address' => '15 Red Oak Street, Kalyan, Maharashtra',
                'city' => 'Kalyan',
                'pincode' => '421306',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Bhiwandi Addresses
            [
                'id' => 13,
                'user_id' => 13,
                'full_address' => '29 King Road, Bhiwandi, Maharashtra',
                'city' => 'Bhiwandi',
                'pincode' => '421308',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 14,
                'user_id' => 14,
                'full_address' => '85 Elm Street, Bhiwandi, Maharashtra',
                'city' => 'Bhiwandi',
                'pincode' => '421309',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 15,
                'user_id' => 15,
                'full_address' => '47 Magnolia Lane, Bhiwandi, Maharashtra',
                'city' => 'Bhiwandi',
                'pincode' => '421310',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 16,
                'user_id' => 16,
                'full_address' => '99 Silver Valley, Bhiwandi, Maharashtra',
                'city' => 'Bhiwandi',
                'pincode' => '421311',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 17,
                'user_id' => 17,
                'full_address' => '12 Ashbury Heights, Bhiwandi, Maharashtra',
                'city' => 'Bhiwandi',
                'pincode' => '421312',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 18,
                'user_id' => 18,
                'full_address' => '34 Golden Gate, Bhiwandi, Maharashtra',
                'city' => 'Bhiwandi',
                'pincode' => '421313',
                'is_default' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($addresses as $address) {
            UserAddress::updateOrCreate(
                ['user_id' => $address['user_id']], // Ensure each user gets only one address
                $address
            );
        }
    }
}
