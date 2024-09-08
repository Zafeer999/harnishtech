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
                'name' => 'Morning Slot',
                'from_time' => '08:00:00',
                'to_time' => '12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Afternoon Slot',
                'from_time' => '12:00:00',
                'to_time' => '16:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Evening Slot',
                'from_time' => '16:00:00',
                'to_time' => '20:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Night Slot',
                'from_time' => '20:00:00',
                'to_time' => '23:59:59',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Late Night Slot',
                'from_time' => '00:00:00',
                'to_time' => '04:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Early Morning Slot',
                'from_time' => '04:00:00',
                'to_time' => '08:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Midday Slot',
                'from_time' => '11:00:00',
                'to_time' => '15:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Late Afternoon Slot',
                'from_time' => '15:00:00',
                'to_time' => '19:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Noon Slot',
                'from_time' => '12:00:00',
                'to_time' => '13:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'After Noon Slot',
                'from_time' => '13:00:00',
                'to_time' => '14:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Pre-Dinner Slot',
                'from_time' => '18:00:00',
                'to_time' => '19:30:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Dinner Slot',
                'from_time' => '19:30:00',
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
