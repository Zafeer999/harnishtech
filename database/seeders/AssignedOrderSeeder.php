<?php

namespace Database\Seeders;

use App\Models\AssignedOrder;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignedOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assignedOrder = [
            [
                'id' => 1,
                'service_boy_user_id' => 9,
                'order_id' => 1,
                'time_slot_id' => 3,
                'pincode' => '421302',
                'category_id' => 5,
                'scheduled_on' => Carbon::now()->addDays(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'service_boy_user_id' => 10,
                'order_id' => 2,
                'time_slot_id' => 2,
                'pincode' => '421303',
                'category_id' => 4,
                'scheduled_on' => Carbon::now()->addDays(2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach($assignedOrder as $order)
        {
            AssignedOrder::updateOrCreate(
                ['id' => $order['id']], // Unique identifier
                $order // Order data to be inserted or updated
            );
        }

    }
}
