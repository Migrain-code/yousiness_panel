<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personels', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->boolean('accept')->nullable();
            $table->integer('rest_day');
            $table->time('start_time');
            $table->time('end_time');
            $table->time('food_start')->nullable();
            $table->time('food_end')->nullable();
            $table->string('gender');
            $table->integer('rate');
            $table->string('range');
            $table->longText('description')->nullable();
            $table->boolean('accepted_type')->default(0)/*0 panel 1 personel*/;
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
        Schema::dropIfExists('personels');
    }
};
