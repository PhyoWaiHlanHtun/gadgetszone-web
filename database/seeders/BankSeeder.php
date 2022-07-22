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
        $bank->name = "Topup Account (TRC)";
        $bank->image = "";
        $bank->account = '12345678900';
        $bank->phone = "";
        $bank->type = 1;
        $bank->save();

        $bank = new Bank();
        $bank->name = "Topup Acount (ERC)";
        $bank->image = "";
        $bank->account = '12345678901';
        $bank->phone = "";
        $bank->type = 1;
        $bank->save();

        $bank = new Bank();
        $bank->name = "Investment Account (TRC)";
        $bank->image = "";
        $bank->account = '12345678900';
        $bank->phone = "";
        $bank->type = 2;
        $bank->save();

        $bank = new Bank();
        $bank->name = "Investment Acount (ERC)";
        $bank->image = "";
        $bank->account = '12345678901';
        $bank->phone = "";
        $bank->type = 2;
        $bank->save();

        $bank = new Bank();
        $bank->name = "Donation Account (TRC)";
        $bank->image = "";
        $bank->account = '12345678900';
        $bank->phone = "";
        $bank->type = 3;
        $bank->save();

        $bank = new Bank();
        $bank->name = "Donation Acount (ERC)";
        $bank->image = "";
        $bank->account = '12345678901';
        $bank->phone = "";
        $bank->type = 3;
        $bank->save();
    }
}
