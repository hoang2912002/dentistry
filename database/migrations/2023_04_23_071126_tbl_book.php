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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('user_uuid')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->dateTime('date_appointment');
            $table->unsignedInteger('shift_id');
            $table->uuid('doctor_uuid');
            $table->text('note');
            $table->timestamps();
            $table->foreign('user_uuid')->nullable()->references('uuid')->on('users');
            $table->foreign('doctor_uuid')->nullable()->references('uuid')->on('users');
            $table->foreign('shift_id')->nullable()->references('id')->on('shifts');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
