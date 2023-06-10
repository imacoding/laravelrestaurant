<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->unsignedBigInteger('cat_id');
            $table->string('item_name', 255);
            $table->longText('item_description')->nullable();
            $table->string('item_price', 255);
            $table->string('delivery_time', 255)->nullable();
            $table->integer('item_status')->default(1)->comment('1 = Yes, 2 = No');
            $table->integer('is_deleted')->default(2)->comment('1 = Yes, 2 = No');
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
        Schema::dropIfExists('item');
    }
}
