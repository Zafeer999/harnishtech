<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timeSlots = [
            [
                'name' => '09:00AM to 11:00AM',
                'from_time' => '09:00:00',
                'to_time' => '11:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => '11:00AM to 01:00PM',
                'from_time' => '11:00:00',
                'to_time' => '13:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => '01:00PM to 03:00PM',
                'from_time' => '13:00:00',
                'to_time' => '15:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => '03:00PM to 05:00PM',
                'from_time' => '15:00:00',
                'to_time' => '17:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => '05:00PM to 07:00PM',
                'from_time' => '17:00:00',
                'to_time' => '19:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => '07:00PM to 09:00PM',
                'from_time' => '19:00:00',
                'to_time' => '21:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

        ];

        foreach ($timeSlots as $slot) {
            TimeSlot::updateOrCreate(
                ['name' => $slot['name']], // Unique key
                [
                    'from_time' => $slot['from_time'],
                    'to_time' => $slot['to_time'],
                    'created_at' => $slot['created_at'],
                    'updated_at' => $slot['updated_at'],
                    'deleted_at' => $slot['deleted_at'],
                ]
            );
        }
    }
}
