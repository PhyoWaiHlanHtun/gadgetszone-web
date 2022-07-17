<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_identities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('withdrawal_id');
            $table->foreign('withdrawal_id')->references('id')->on('withdrawls')->onDelete('cascade');
            $table->string('name');
            $table->string('number');
            $table->text('front');
            $table->text('back');
            $table->text('selfie');
            $table->text('address')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('withdrawal_identities');
    }
}
