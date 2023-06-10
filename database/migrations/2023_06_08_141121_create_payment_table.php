<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
           $table->increments('id');
            $table->string('payment_name', 50);
            $table->integer('is_available');
            $table->text('test_public_key');
            $table->text('test_secret_key');
            $table->text('live_public_key')->nullable();
            $table->text('live_secret_key')->nullable();
            $table->integer('environment');
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
        Schema::dropIfExists('payment');
    }
}
