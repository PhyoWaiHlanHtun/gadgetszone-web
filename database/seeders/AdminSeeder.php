<?php

namespace Database\Seeders;

use App\Models\AdminStaff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new AdminStaff();
        $admin->username = "Gadgets Zone";
        $admin->email = "admin@gmail.com";
        $admin->phone = "09123456789";
        $admin->password = Hash::make('password');
        $admin->is_admin = 1;
        $admin->save();
    }
}
