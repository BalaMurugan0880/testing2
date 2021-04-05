<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = role::where('name', 'admin')->first();
        $userRole = role::where('name', 'user')->first();
        $vendorRole = role::where('name', 'vendor')->first();

        $admin = User::create([
        	'name' => 'Admin User',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('password'),
            'role' => 'admin',
        	'email_verified_at' =>  now(),
        ]);

         $user = User::create([
        	'name' => 'User',
        	'email' => 'user@user.com',
        	'password' => Hash::make('password'),
            'role' => 'user',
        	'email_verified_at' =>  now(),
        ]);

         $vendor = User::create([
            'name' => 'vendor',
            'email' => 'vendor@vendor.com',
            'password' => Hash::make('password'),
            'role' => 'vendor',
            'email_verified_at' =>  now(),
        ]);

         $admin->roles()->attach($adminRole);
         $user->roles()->attach($userRole);
         $vendor->roles()->attach($vendorRole);
    }
}
