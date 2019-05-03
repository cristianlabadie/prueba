<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Site Administrator',
            'description' => 'User administrator',
        ]);

        DB::table('roles')->insert([
            'name' => 'normal',
            'display_name' => 'Normal User',
            'description' => 'being bored person',
        ]);
    }
}
