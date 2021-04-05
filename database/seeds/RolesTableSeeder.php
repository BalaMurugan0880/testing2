<?php

use Illuminate\Database\Seeder;
use App\role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       role::truncate();

       role::create(['name' => 'admin']);
       role::create(['name' => 'user']);
       role::create(['name' => 'vendor']);
    }
}
