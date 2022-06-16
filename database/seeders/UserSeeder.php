<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'=>'Admin',
            'phone'=>'9876543210',
            'role_id'=> User::ROLE_ADMIN,
            'email'=>'admin@gmail.com',
            'password'=>Hash::make(123456),
        ]);

    }
}
