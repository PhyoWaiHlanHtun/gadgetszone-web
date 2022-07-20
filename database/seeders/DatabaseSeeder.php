<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Topup;
use App\Models\Donation;
use App\Models\Purchase;
use App\Models\Referral;
use App\Models\BonusFine;
use App\Models\Withdrawl;
use App\Models\DigiInvest;
use App\Models\UserAmount;
use App\Models\UserIdentity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // User::truncate();
        // UserAmount::truncate();
        // UserIdentity::truncate();
        // Group::truncate();
        // Withdrawl::truncate();
        // Topup::truncate();
        // BonusFine::truncate();
        // DigiInvest::truncate();
        // Donation::truncate();
        // Referral::truncate();
        // Level::truncate();
        // Purchase::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call([
            // AdminSeeder::class,
            // StaffSeeder::class,
            // AgentSeeder::class,
            // UserSeeder::class,
            // LevelSeeder::class,
            // ReferralSeeder::class,
            // GroupSeeder::class,
            // BankSeeder::class,
            // PartnerSeeder::class,
            // AccountantSeeder::class,

            // AccountSeeder::class,
        ]);
        // DB::table('donations')->delete();
    }
}
