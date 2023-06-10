<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
         $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('profile_image', 100);
            $table->string('password');
            $table->string('login_type', 10)->nullable();
            $table->text('google_id')->nullable();
            $table->text('facebook_id')->nullable();
            $table->integer('type');
            $table->string('tax', 20)->nullable();
            $table->string('delivery_charge', 50)->nullable();
            $table->string('currency', 10)->nullable();
            $table->integer('max_order_qty')->nullable();
            $table->integer('min_order_amount')->nullable();
            $table->integer('max_order_amount')->nullable();
            $table->text('lat')->nullable();
            $table->text('lang')->nullable();
            $table->text('map')->nullable();
            $table->text('firebase')->nullable();
            $table->string('timezone', 255)->nullable();
            $table->longText('token')->nullable();
            $table->string('referral_amount', 99)->nullable();
            $table->string('wallet', 50)->nullable();
            $table->string('referral_code', 10)->nullable();
            $table->integer('is_available')->default(1)->comment('1 = Yes, 2 = No');
            $table->string('otp', 6)->nullable();
            $table->integer('is_verified')->nullable()->comment('1 = Yes, 2 = No');
            $table->text('purchase_key')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
