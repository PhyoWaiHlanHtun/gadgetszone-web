<?php

namespace Database\Seeders;

use App\Models\AdminStaff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = new AdminStaff();
        $staff->username = "Gadgetszone Staff";
        $staff->email = "staff@gmail.com";
        $staff->phone = "09123456789";
        $staff->password = Hash::make('password');
        $staff->is_admin = 0;
        $staff->save();

        $staff = new AdminStaff();
        $staff->username = "John Doe";
        $staff->email = "john@gmail.com";
        $staff->phone = "09123456789";
        $staff->password = Hash::make('password');
        $staff->is_admin = 0;
        $staff->save();

        $staff = new AdminStaff();
        $staff->username = "David Smith";
        $staff->email = "david@gmail.com";
        $staff->phone = "09123456789";
        $staff->password = Hash::make('password');
        $staff->is_admin = 0;
        $staff->save();

        $staff = new AdminStaff();
        $staff->username = "Nike";
        $staff->email = "nike@gmail.com";
        $staff->phone = "09123456789";
        $staff->password = Hash::make('password');
        $staff->is_admin = 0;
        $staff->save();
    }
}
