<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocode', function (Blueprint $table) {
         $table->bigIncrements('id');
            $table->string('offer_name', 255)->collation('utf8mb4_unicode_ci');
            $table->string('offer_code', 20)->collation('utf8mb4_unicode_ci');
            $table->string('offer_amount', 255)->collation('utf8mb4_unicode_ci');
            $table->longText('description')->collation('utf8mb4_unicode_ci');
            $table->integer('is_available')->default(1)->comment('1 = Yes, 2 = No');
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
        Schema::dropIfExists('promocode');
    }
}
