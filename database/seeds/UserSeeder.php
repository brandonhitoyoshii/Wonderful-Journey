<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Joe',
            'email'=>'J@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('joe'),
            'phone'=>'012391902319'],
            ['name'=>'Harden Boy',
            'email'=>'hb@gmail.com',
            'role'=>'user',
            'password'=>bcrypt('hb'),
            'phone'=>'082319080913'],
            ['name'=>'Oz',
            'email'=>'z@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('oz'),
            'phone'=>'012391231131']
        ]);
    }
}
