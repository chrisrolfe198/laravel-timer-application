<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'Chris Rolfe',
            'email' => 'christopher.rolfe198@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
