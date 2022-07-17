<?php

namespace Database\Seeders;

use App\Models\Referral;
use Illuminate\Database\Seeder;

class ReferralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $referral = new Referral();
        $referral->code = 'test';
        $referral->user_id = 1;
        $referral->level_id = 1;
        $referral->save();

        $referral = new Referral();
        $referral->code = 'abc';
        $referral->user_id = 2;
        $referral->level_id = 2;
        $referral->save();

        $referral = new Referral();
        $referral->code = 'hello';
        $referral->user_id = 3;
        $referral->level_id = 3;
        $referral->save();

        $referral = new Referral();
        $referral->code = 'laravel';
        $referral->user_id = 4;
        $referral->level_id = 1;
        $referral->save();
    }
}
