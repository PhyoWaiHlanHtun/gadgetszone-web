<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invest_rates', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('invest_id');
            $table->foreign('invest_id')->references('id')->on('digi_invests')->onDelete('cascade');
            $table->integer('plan');
            $table->string('rate');
            $table->string('profit')->nullable();
            $table->integer('period');
            $table->date('expire_date');
            $table->boolean('status')->default(0);
            $table->boolean('type')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invest_rates');
    }
}
