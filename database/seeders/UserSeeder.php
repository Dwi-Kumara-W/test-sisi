<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '707070',
            'wa' => '80808080',
            'pin' => '123',
            'jenis_kelamin' => 'laki-laki',
            'status_user' => 'admin',
            'deleted_mark' => '0',
            'created_by' => '0',
            'updated_by' => '0',
            'password' => bcrypt('admin123'),
        ]);
    }
}
