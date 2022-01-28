<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'nama' => 'Admin2',
            'username' => 'super',
            'nohp' => '0230120312',
            'email' => 'supe@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Super Admin'
        ]);
    }
}
