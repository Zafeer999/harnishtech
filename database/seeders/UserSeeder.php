<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example users data
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'mobile' => '1234567890',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 1,
                'otp' => '123456',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'mobile' => '0987654321',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 1,
                'otp' => '654321',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'mobile' => '1122334455',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 1,
                'otp' => '789012',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob@example.com',
                'mobile' => '2233445566',
                'email_verified_at' => null,
                'password' => Hash::make('user@123'),
                'is_service_boy' => 1,
                'otp' => '345678',
                'active_status' => 0,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Charlie Davis',
                'email' => 'charlie@example.com',
                'mobile' => '3344556677',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 1,
                'otp' => '567890',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Emily White',
                'email' => 'emily@example.com',
                'mobile' => '4455667788',
                'email_verified_at' => null,
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '123789',
                'active_status' => 0,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Michael Green',
                'email' => 'michael@example.com',
                'mobile' => '5566778899',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '456123',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Sarah Black',
                'email' => 'sarah@example.com',
                'mobile' => '6677889900',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '789456',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'David Wilson',
                'email' => 'david@example.com',
                'mobile' => '7788990011',
                'email_verified_at' => null,
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '101112',
                'active_status' => 0,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Laura Thompson',
                'email' => 'laura@example.com',
                'mobile' => '8899001122',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '789123',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Paul Martinez',
                'email' => 'paul@example.com',
                'mobile' => '9900112233',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '321654',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Linda Garcia',
                'email' => 'linda@example.com',
                'mobile' => '0112233445',
                'email_verified_at' => null,
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '654987',
                'active_status' => 0,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Henry Cooper',
                'email' => 'henry@example.com',
                'mobile' => '1223344556',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '963852',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Nina King',
                'email' => 'nina@example.com',
                'mobile' => '2334455667',
                'email_verified_at' => null,
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '741852',
                'active_status' => 0,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Tom Brown',
                'email' => 'tom@example.com',
                'mobile' => '3445566778',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('user@123'),
                'is_service_boy' => 0,
                'otp' => '258963',
                'active_status' => 1,
                'remember_token' => Str::random(10)
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // Unique attribute for update or create
                [
                    'name' => $user['name'],
                    'mobile' => $user['mobile'],
                    'email_verified_at' => $user['email_verified_at'],
                    'password' => $user['password'],
                    'is_service_boy' => $user['is_service_boy'],
                    'otp' => $user['otp'],
                    'active_status' => $user['active_status'],
                    'remember_token' => $user['remember_token'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'deleted_at' => null,
                ]
            );
        }
    }
}
