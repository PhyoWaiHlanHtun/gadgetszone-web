<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Group();
        $group->leader_id = 1;
        $group->member_id = 2;
        $group->save();

        $group = new Group();
        $group->leader_id = 2;
        $group->member_id = 3;
        $group->save();
    }
}
