<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
             $table->id();
            $table->longText('about_content')->nullable();
            $table->string('image', 50);
            $table->string('logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->text('fb')->nullable();
            $table->text('twitter')->nullable();
            $table->text('insta')->nullable();
            $table->text('android')->nullable();
            $table->text('ios')->nullable();
            $table->text('copyright')->nullable();
            $table->string('title')->nullable();
            $table->string('short_title', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('about');
    }
}
