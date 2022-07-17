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
        $user = new User();
        $user->username = "John Doe";
        $user->email = "user@gmail.com";
        $user->phone = "09123456789";
        $user->password = Hash::make('password');
        $user->referral_id = null;
        $user->status = 1;
        $user->save();

        $user = new User();
        $user->username = "David";
        $user->email = "david@gmail.com";
        $user->phone = "09123456789";
        $user->password = Hash::make('password');
        $user->referral_id = 2;
        $user->status = 1;
        $user->save();

        $user = new User();
        $user->username = "Kyaw Kyaw";
        $user->email = "kyaw@gmail.com";
        $user->phone = "09123456789";
        $user->password = Hash::make('password');
        $user->referral_id = 3;
        $user->status = 1;
        $user->save();

        $user = new User();
        $user->username = "Bruce";
        $user->email = "bruce@gmail.com";
        $user->phone = "09123456789";
        $user->password = Hash::make('password');
        $user->referral_id = 4;
        $user->status = 1;
        $user->save();
    }
}
