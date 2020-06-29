<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['profile', 'user', 'group', 'post', 'category'];

        foreach ($names as $name) {
            DB::table('permissions')->insert([
                'code' => $name . '_create',
                'name' => ucfirst($name) . ' Create',
                'description' => 'User can create ' . $name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);


            DB::table('permissions')->insert([
                'code' => $name . '_read',
                'name' => ucfirst($name) . ' Read',
                'description' => 'User can read ' . $name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('permissions')->insert([
                'code' => $name . '_update',
                'name' => ucfirst($name) . ' Update',
                'description' => 'User can update ' . $name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            DB::table('permissions')->insert([
                'code' => $name . '_delete',
                'name' => ucfirst($name) . ' Delete',
                'description' => 'User can delete ' . $name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

    }
}
