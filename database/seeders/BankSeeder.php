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
        $bank->account = '1GwwrW8KaNp7gqg9x827YAfpGp3vQrN3Ga';
        $bank->phone = "";
        $bank->type = 1;
        $bank->save();

        $bank = new Bank();
        $bank->name = "Investment Acount (TRC)";
        $bank->image = "";
        $bank->account = '1EFpmnoXezwmwY8buPhgiSQkxQKmR5G9Ur';
        $bank->phone = "";
        $bank->type = 2;
        $bank->save();

        $bank = new Bank();
        $bank->name = "Donation Account (TRC)";
        $bank->image = "";
        $bank->account = '16BZMZoist5xmdtRxNaVkwufdvRDJYA9Qp';
        $bank->phone = "";
        $bank->type = 3;
        $bank->save();
    }
}
