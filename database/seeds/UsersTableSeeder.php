<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'rateinc@rateinc.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Arya Stark',
            'email' => 'arya@got.com',
            'password' => bcrypt('12345678'),
        ]);

        $adminUser = User::find(1);
        $adminUser->roles()->attach([1]);

        $normalUser = User::find(2);
        $normalUser->roles()->attach([2]);
    }
}
