<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'first_name' => 'An',
            'last_name' => 'Dang Thua',
            'username' => 'admin',
            'email' => 'admin@omt-magazine.test',
            'password' => Hash::make('an'),
        ]);
    }
}
