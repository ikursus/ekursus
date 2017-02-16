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
        DB::table('users')->insert([
            'username' => 'admin',
            'nama' => 'Ahmad Albab',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'telefon' => '0123456789',
            'status' => 'admin'
        ]);

        DB::table('users')->insert([
            'username' => 'demo',
            'nama' => 'Demo User',
            'email' => 'demo@gmail.com',
            'password' => bcrypt('demo'),
            'telefon' => '0123456789',
            'status' => 'user'
        ]);

        DB::table('users')->insert([
            'username' => 'test',
            'nama' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt('test'),
            'telefon' => '0123456789',
            'status' => 'user'
        ]);

        DB::table('users')->insert([
            'username' => 'admin2',
            'nama' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin2'),
            'telefon' => '0123456789',
            'status' => 'admin'
        ]);

        DB::table('users')->insert([
            'username' => 'user1',
            'nama' => 'User Demo',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('user1'),
            'telefon' => '0123456789',
            'status' => 'user'
        ]);
    }
}
