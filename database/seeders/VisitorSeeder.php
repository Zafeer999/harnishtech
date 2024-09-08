<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visitors = [
            [
                'ip_address' => '34.201.12.34',
                'url' => 'https://example.com/home',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '192.168.1.223',
                'url' => 'https://example.com/about',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '198.51.100.45',
                'url' => 'https://example.com/contact',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '203.0.113.85',
                'url' => 'https://example.com/services',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '45.33.32.156',
                'url' => 'https://example.com/products',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '23.45.67.89',
                'url' => 'https://example.com/blog',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '172.67.213.45',
                'url' => 'https://example.com/careers',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '198.51.100.23',
                'url' => 'https://example.com/faq',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '64.233.160.56',
                'url' => 'https://example.com/terms',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '216.58.214.110',
                'url' => 'https://example.com/privacy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '142.250.72.46',
                'url' => 'https://example.com/feedback',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ip_address' => '172.16.254.18',
                'url' => 'https://example.com/support',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($visitors as $visitor) {
            Visitor::updateOrCreate(
                ['ip_address' => $visitor['ip_address'], 'url' => $visitor['url']], // Unique keys
                [
                    'created_at' => $visitor['created_at'],
                    'updated_at' => $visitor['updated_at'],
                ]
            );
        }
    }
}
