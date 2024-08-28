<?php

namespace Database\Seeders;

use App\Models\ServiceBoy;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceBoySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example service boy data
        $serviceBoys = [
            [
                'user_id' => 3,
                'emp_code' => 'EMP001',
                'gender' => 'Male',
                'dob' => '1990-05-15',
                'doj' => '2020-06-01',
                'avg_rating' => 4.5,
                'address' => '123 Bhiwandi Street, Bhiwandi, Maharashtra',
                'status' => 1
            ],
            [
                'user_id' => 4,
                'emp_code' => 'EMP002',
                'gender' => 'Male',
                'dob' => '1988-11-22',
                'doj' => '2019-04-10',
                'avg_rating' => 4.2,
                'address' => '456 Kalyan Avenue, Kalyan, Maharashtra',
                'status' => 1
            ],
            [
                'user_id' => 5,
                'emp_code' => 'EMP003',
                'gender' => 'Female',
                'dob' => '1995-07-18',
                'doj' => '2021-08-15',
                'avg_rating' => 4.8,
                'address' => '789 Dombivli Boulevard, Dombivli, Maharashtra',
                'status' => 1
            ],
            [
                'user_id' => 6,
                'emp_code' => 'EMP004',
                'gender' => 'Female',
                'dob' => '1992-03-05',
                'doj' => '2018-12-01',
                'avg_rating' => 4.7,
                'address' => '321 Bhiwandi Road, Bhiwandi, Maharashtra',
                'status' => 0
            ],
            [
                'user_id' => 7,
                'emp_code' => 'EMP005',
                'gender' => 'Male',
                'dob' => '1985-02-17',
                'doj' => '2017-09-11',
                'avg_rating' => 4.9,
                'address' => '654 Kalyan Lane, Kalyan, Maharashtra',
                'status' => 1
            ],
            [
                'user_id' => 8,
                'emp_code' => 'EMP006',
                'gender' => 'Male',
                'dob' => '1993-10-30',
                'doj' => '2022-01-20',
                'avg_rating' => 4.3,
                'address' => '987 Dombivli Way, Dombivli, Maharashtra',
                'status' => 1
            ],
        ];

        foreach ($serviceBoys as $serviceBoy) {
            ServiceBoy::updateOrCreate(
                ['user_id' => $serviceBoy['user_id']], // Unique attribute for update or create
                [
                    'emp_code' => $serviceBoy['emp_code'],
                    'gender' => $serviceBoy['gender'],
                    'dob' => $serviceBoy['dob'],
                    'doj' => $serviceBoy['doj'],
                    'avg_rating' => $serviceBoy['avg_rating'],
                    'address' => $serviceBoy['address'],
                    'status' => $serviceBoy['status'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'deleted_at' => null,
                ]
            );
        }
    }
}
