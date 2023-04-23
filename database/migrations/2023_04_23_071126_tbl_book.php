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
            $table->dateTime('date_time');
            $table->timestamps();
            $table->foreign('user_uuid')->nullable()->references('uuid')->on('users');
            
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
