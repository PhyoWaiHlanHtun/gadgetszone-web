<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpireDateToUserAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_amounts', function (Blueprint $table) {
            $table->date('expire_date')->nullable()->after('total');
            $table->boolean('expire_status')->default(0)->after('expire_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_amounts', function (Blueprint $table) {
            //
        });
    }
}
