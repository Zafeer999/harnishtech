<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'id' => 1,
                'name' => 'dashboard.view',
                'group' => 'dashboard',
            ],
            [
                'id' => 2,
                'name' => 'users.view',
                'group' => 'users',
            ],
            [
                'id' => 3,
                'name' => 'users.create',
                'group' => 'users',
            ],
            [
                'id' => 4,
                'name' => 'users.edit',
                'group' => 'users',
            ],
            [
                'id' => 5,
                'name' => 'users.delete',
                'group' => 'users',
            ],
            [
                'id' => 6,
                'name' => 'roles.view',
                'group' => 'roles',
            ],
            [
                'id' => 7,
                'name' => 'roles.create',
                'group' => 'roles',
            ],
            [
                'id' => 8,
                'name' => 'roles.edit',
                'group' => 'roles',
            ],
            [
                'id' => 9,
                'name' => 'categories.create',
                'group' => 'categories',
            ],
            [
                'id' => 10,
                'name' => 'categories.view',
                'group' => 'categories',
            ],
            [
                'id' => 11,
                'name' => 'categories.edit',
                'group' => 'categories',
            ],
            [
                'id' => 12,
                'name' => 'categories.delete',
                'group' => 'categories',
            ],
            [
                'id' => 13,
                'name' => 'subcategories.create',
                'group' => 'subcategories',
            ],
            [
                'id' => 14,
                'name' => 'subcategories.view',
                'group' => 'subcategories',
            ],
            [
                'id' => 15,
                'name' => 'subcategories.edit',
                'group' => 'subcategories',
            ],
            [
                'id' => 16,
                'name' => 'subcategories.delete',
                'group' => 'subcategories',
            ],
            [
                'id' => 17,
                'name' => 'coupons.create',
                'group' => 'coupons',
            ],
            [
                'id' => 18,
                'name' => 'coupons.view',
                'group' => 'coupons',
            ],
            [
                'id' => 19,
                'name' => 'coupons.edit',
                'group' => 'coupons',
            ],
            [
                'id' => 20,
                'name' => 'coupons.delete',
                'group' => 'coupons',
            ],

            [
                'id' => 21,
                'name' => 'timeslots.create',
                'group' => 'timeslots',
            ],
            [
                'id' => 22,
                'name' => 'timeslots.view',
                'group' => 'timeslots',
            ],
            [
                'id' => 23,
                'name' => 'timeslots.edit',
                'group' => 'timeslots',
            ],
            [
                'id' => 24,
                'name' => 'timeslots.delete',
                'group' => 'timeslots',
            ],
            [
                'id' => 25,
                'name' => 'cities.create',
                'group' => 'cities',
            ],
            [
                'id' => 26,
                'name' => 'cities.view',
                'group' => 'cities',
            ],
            [
                'id' => 27,
                'name' => 'cities.edit',
                'group' => 'cities',
            ],
            [
                'id' => 28,
                'name' => 'cities.delete',
                'group' => 'cities',
            ],
            [
                'id' => 29,
                'name' => 'banner_sliders.create',
                'group' => 'banner_sliders',
            ],
            [
                'id' => 30,
                'name' => 'banner_sliders.view',
                'group' => 'banner_sliders',
            ],
            [
                'id' => 31,
                'name' => 'banner_sliders.edit',
                'group' => 'banner_sliders',
            ],
            [
                'id' => 32,
                'name' => 'banner_sliders.delete',
                'group' => 'banner_sliders',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'id' => $permission['id']
            ], [
                'id' => $permission['id'],
                'name' => $permission['name'],
                'group' => $permission['group']
            ]);
        }
    }
}
