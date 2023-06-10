<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->bigInteger('item_id')->unsigned();
            $table->string('name', 50);
            $table->string('price', 20)->default('0');
            $table->integer('is_available')->default(1)->comment('1 = Yes, 2 = No');
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
        Schema::dropIfExists('addons');
    }
}
