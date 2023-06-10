<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
          $table->bigIncrements('id');
            $table->string('order_number', 100);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->string('order_total', 255);
            $table->string('razorpay_payment_id', 255)->nullable();
            $table->string('payment_type', 255);
            $table->integer('order_type')->default(1)->comment('1 = Delivery, 2 = Pickup');
            $table->string('address', 255)->nullable();
            $table->string('pincode', 10)->nullable();
            $table->text('lat')->nullable();
            $table->text('lang')->nullable();
            $table->string('building', 255)->nullable();
            $table->string('landmark', 255)->nullable();
            $table->string('promocode', 50)->nullable();
            $table->string('discount_amount', 50)->nullable();
            $table->string('discount_pr', 50)->nullable();
            $table->string('tax', 50)->nullable();
            $table->string('tax_amount', 50)->nullable();
            $table->string('delivery_charge', 50)->nullable();
            $table->text('order_notes')->nullable();
            $table->string('order_from', 10)->nullable();
            $table->integer('status');
            $table->integer('is_notification')->default(1)->comment('1 = Unread, 2 = Read');
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
        Schema::dropIfExists('order');
    }
}
