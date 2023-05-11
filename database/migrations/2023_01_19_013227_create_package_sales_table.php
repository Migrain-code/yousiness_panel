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
        Schema::create('package_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id');
            $table->dateTime('seller_date');
            $table->integer('customer_id');
            $table->integer('service_id');
            $table->integer('personel_id');
            $table->integer('type');
            $table->integer('amount');
            $table->double('used_amount')->default(0);
            $table->double('total');
            $table->double('payed')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('package_sales');
    }
};
