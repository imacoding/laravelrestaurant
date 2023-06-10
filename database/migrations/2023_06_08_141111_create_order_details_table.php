<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->string('price', 255);
            $table->string('qty', 255)->nullable();
            $table->text('item_notes')->nullable();
            $table->string('addons_id', 255)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('order_id')->references('id')->on('order')->onDelete('set null');
            $table->foreign('item_id')->references('id')->on('item')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}

