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
        Schema::create('medical_record_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medical_record_id');
            $table->unsignedInteger('prescription_id');
            $table->unsignedInteger('user_service_id');
            $table->timestamps();
            $table->foreign('medical_record_id')->references('id')->on('medical_records');
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
            $table->foreign('user_service_id')->references('id')->on('user_services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_record_details');
    }
};
