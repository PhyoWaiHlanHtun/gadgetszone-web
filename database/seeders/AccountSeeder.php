<?php

namespace Database\Seeders;

use App\Models\AdminStaff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminStaff::truncate();
        
        $admin = new AdminStaff();
        $admin->username = "Admin";
        $admin->email = "admin@gmail.com";
        $admin->phone = "09123456789";
        $admin->password = Hash::make('password');
        $admin->is_admin = 1;
        $admin->save();

        $admin = new AdminStaff();
        $admin->username = "Accountant";
        $admin->email = "accountant@gmail.com";
        $admin->phone = "09123456789";
        $admin->password = Hash::make('password');
        $admin->is_admin = 2;
        $admin->save();

        $staff = new AdminStaff();
        $staff->username = "Staff";
        $staff->email = "staff@gmail.com";
        $staff->phone = "09123456789";
        $staff->password = Hash::make('password');
        $staff->is_admin = 0;
        $staff->save();
    }
}
