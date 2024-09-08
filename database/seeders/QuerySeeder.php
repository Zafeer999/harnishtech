<?php

namespace Database\Seeders;

use App\Models\Query;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $queries = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'mobile' => '1234567890', 'message' => 'I need help with my order.'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'mobile' => '0987654321', 'message' => 'How can I track my shipment?'],
            ['name' => 'Bob Brown', 'email' => 'bob@example.com', 'mobile' => '1122334455', 'message' => 'What is the return policy?'],
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'mobile' => '2233445566', 'message' => 'I want to cancel my subscription.'],
            ['name' => 'Charlie Davis', 'email' => 'charlie@example.com', 'mobile' => '3344556677', 'message' => 'How do I reset my password?'],
            ['name' => 'Emily White', 'email' => 'emily@example.com', 'mobile' => '4455667788', 'message' => 'I have a complaint about a product.'],
            ['name' => 'Michael Green', 'email' => 'michael@example.com', 'mobile' => '5566778899', 'message' => 'Is there a discount for bulk orders?'],
            ['name' => 'Sarah Black', 'email' => 'sarah@example.com', 'mobile' => '6677889900', 'message' => 'Can I change my delivery address?'],
            ['name' => 'David Wilson', 'email' => 'david@example.com', 'mobile' => '7788990011', 'message' => 'I am unable to log in to my account.'],
            ['name' => 'Laura Thompson', 'email' => 'laura@example.com', 'mobile' => '8899001122', 'message' => 'Do you offer international shipping?'],
            ['name' => 'Paul Martinez', 'email' => 'paul@example.com', 'mobile' => '9900112233', 'message' => 'Can I get a VAT invoice?'],
            ['name' => 'Linda Garcia', 'email' => 'linda@example.com', 'mobile' => '0112233445', 'message' => 'How do I use my promo code?'],
        ];

        foreach ($queries as $query) {
            Query::updateOrCreate(
                ['email' => $query['email']], // Unique attribute for update or create
                [
                    'name' => $query['name'],
                    'mobile' => $query['mobile'],
                    'message' => $query['message'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
