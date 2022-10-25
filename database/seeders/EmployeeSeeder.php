<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Employee::truncate();
        // Schema::enableForeignKeyConstraints();
        $data = [
            [
            'name' => 'Dwi Kumara Widyatna',
            'wa' => '082332799958',
            'jabatan' => 'staff',
            'email' => 'kumarawidyatnadwi@gmail.com',
            'password' => '$2y$10$81UJ3tAhif0CiRzgXxQ65.YLjcJXdPFs46gznmVcG8MayyqvHIwFi'
            ]
        ];

        foreach($data as $value){
            Employee::insert([
                'name' => $value['name'],
                'wa' => $value['wa'],
                'jabatan' => $value['jabatan'],
                'email' => $value['email'],
                'password' => $value['password'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
