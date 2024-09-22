<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'id' => 1,
                'time_slot_id' => 1,
                'user_id' => 9,
                // 'category_id' => 1,
                // 'sub_category_id' => 7,
                // 'amount' => 1000.00,
                'user_address_id' => 2,
                'coupon_id' => null,
                'order_no' => 'ORD0001',
                'status' => 0, // placed
                'is_assigned' => 0, // unassigned
                'charges' => 50.00,
                'gst_charge' => 18.00,
                'total' => 1068.00,
                'scheduled_on' => Carbon::now()->addDay(),
                'serviced_on' => null,
                'order_note' => 'Please deliver by evening.',
                'payment_type' => 0, // prepaid
                'payment_method' => 1, // online
                'payment_status' => 1, // paid
                'invoice_path' => '/invoices/ORD0001.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add 3 more orders as needed...
            [
                'id' => 2,
                'time_slot_id' => 2,
                'user_id' => 10,
                // 'category_id' => 2,
                // 'sub_category_id' => 8,
                // 'amount' => 2000.00,
                'user_address_id' => 3,
                'coupon_id' => 2,
                'order_no' => 'ORD0002',
                'status' => 1, // assigned
                'is_assigned' => 1, // assigned
                'charges' => 100.00,
                'gst_charge' => 36.00,
                'total' => 2136.00,
                'scheduled_on' => Carbon::now()->addDays(2),
                'serviced_on' => null,
                'order_note' => 'Call before arrival.',
                'payment_type' => 1, // postpaid
                'payment_method' => 0, // cash
                'payment_status' => 0, // unpaid
                'invoice_path' => '/invoices/ORD0002.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($orders as $order) {
            Order::updateOrCreate(
                ['order_no' => $order['order_no']], // Unique identifier
                $order // Order data to be inserted or updated
            );
        }
    }
}
