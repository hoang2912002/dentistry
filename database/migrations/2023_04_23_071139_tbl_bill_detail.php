<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bill_id');
            $table->unsignedInteger('prescription_id')->nullable();
            $table->unsignedInteger('user_service_id')->nullable();
            $table->double('total_price');
            $table->timestamps();
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->foreign('prescription_id')->nullable()->references('id')->on('prescriptions');
            $table->foreign('user_service_id')->nullable()->references('id')->on('user_services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_details');
    }
};
