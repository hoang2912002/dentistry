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
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('user_uuid')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->double('total_price');
            $table->boolean('status');
            $table->string('note');
            $table->timestamps();
            $table->foreign('user_uuid')->nullable()->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
