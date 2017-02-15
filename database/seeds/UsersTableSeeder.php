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
    }
}
