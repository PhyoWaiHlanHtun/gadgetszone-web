<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partner = new Partner();
        $partner->image = "";
        $partner->save();

        $partner = new Partner();
        $partner->image = "";
        $partner->save();

        $partner = new Partner();
        $partner->image = "";
        $partner->save();

        $partner = new Partner();
        $partner->image = "";
        $partner->save();
    }
}
