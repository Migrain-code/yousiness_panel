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
        Schema::create('bussiness_package_paypal_sallers', function (Blueprint $table) {
            $table->id();
            $table->string('business_id');
            $table->string('payment_id')->nullable();
            $table->string('payer_id')->nullable();
            $table->string('token')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('bussiness_package_paypal_sallers');
    }
};
