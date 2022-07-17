<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = new Level();
        $level->name = 'A';
        $level->commission = 16;
        $level->save();

        $level = new Level();
        $level->name = 'B';
        $level->commission = 8;
        $level->save();

        $level = new Level();
        $level->name = 'C';
        $level->commission = 4;
        $level->save();

        $level = new Level();
        $level->name = 'D';
        $level->commission = 1;
        $level->save();

        $level = new Level();
        $level->name = 'E';
        $level->commission = 1;
        $level->save();

        $levels = ['F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        foreach ($levels as $l) {
            $level = new Level();
            $level->name = $l;
            $level->commission = 1;
            $level->save();
        }
    }
}
