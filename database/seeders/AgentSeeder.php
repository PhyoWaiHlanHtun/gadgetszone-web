<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agent = new Agent();
        $agent->username = "Agent One";
        $agent->email   = "agent@gmail.com";
        $agent->phone   = "09123456789";
        $agent->password = Hash::make('password');
        $agent->referral = "";
        $agent->status = 1;
        $agent->save();

        $agent = new Agent();
        $agent->username = "Agent Two";
        $agent->email   = "agent2@gmail.com";
        $agent->phone   = "09123456789";
        $agent->password = Hash::make('password');
        $agent->referral = "";
        $agent->status = 1;
        $agent->save();
    }
}
