<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DefaultLoginUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User Seeder ##
        $userRole = Role::updateOrCreate(['name' => 'User']);
        // $permissions = Permission::pluck('id', 'id');
        // $userRole->syncPermissions($permissions);

        $user = User::updateOrCreate([
            'email' => 'user1@gmail.com'
        ], [
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'mobile' => '9876598765',
            'password' => Hash::make('password'),
            'is_service_boy' => 0,
        ]);
        DB::table('model_has_roles')->updateOrInsert([
            'model_type' => 'App\Models\User',
            'model_id' => $user->id,
        ], [
            'role_id' => $userRole->id,
        ]);




        $adminRole = Role::updateOrCreate(['name' => 'Admin']);
        $permissions = Permission::whereNotIn('id', [53,54,55,56,58,67,68])->pluck('id', 'id');
        $adminRole->syncPermissions($permissions);

        $admin = User::updateOrCreate([
            'email' => 'admin@gmail.com'
        ], [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => '9876598765',
            'password' => Hash::make('password'),
            'is_service_boy' => 0,
        ]);
        DB::table('model_has_roles')->updateOrInsert([
            'model_type' => 'App\Models\User',
            'model_id' => $admin->id,
        ], [
            'role_id' => $adminRole->id,
        ]);



        $serviceBoyRole = Role::updateOrCreate(['name' => 'Service Boy']);
        $permissions = Permission::whereIn('id', [53, 54, 55, 56, 57, 58, 63, 64, 65, 67, 68])->pluck('id', 'id');
        $serviceBoyRole->syncPermissions($permissions);

        $serviceBoy = User::updateOrCreate([
            'email' => 'serviceboy@gmail.com'
        ], [
            'name' => 'Service Boy',
            'email' => 'serviceboy@gmail.com',
            'mobile' => '9876598765',
            'password' => Hash::make('password'),
            'is_service_boy' => 1,
        ]);
        DB::table('model_has_roles')->updateOrInsert([
            'model_type' => 'App\Models\User',
            'model_id' => $serviceBoy->id,
        ], [
            'role_id' => $serviceBoyRole->id,
        ]);
    }
}
