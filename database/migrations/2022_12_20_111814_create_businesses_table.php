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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('status')->default(1);
            $table->integer('type');
            $table->string('password');
            $table->string('phone');
            $table->integer('city');
            $table->integer('district');
            $table->string('logo')->nullable();
            $table->string('wallpaper')->nullable();
            $table->longText('embed')->nullable();
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
        Schema::dropIfExists('businesses');
    }
};
