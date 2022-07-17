<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = new Bank();
        $bank->name = "Pay1";
        $bank->image = "";
        $bank->account = Str::random(20);
        $bank->phone = "";
        $bank->save();

        $bank = new Bank();
        $bank->name = "Pay2";
        $bank->image = "";
        $bank->account = Str::random(20);
        $bank->phone = "";
        $bank->save();

        $bank = new Bank();
        $bank->name = "Pay3";
        $bank->image = "";
        $bank->account = Str::random(20);
        $bank->phone = "";
        $bank->save();
    }
}
