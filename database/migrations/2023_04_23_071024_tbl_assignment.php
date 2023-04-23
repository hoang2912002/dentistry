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
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('user_uuid');
            $table->unsignedInteger('role_id');
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();
            $table->foreign('user_uuid')->references('uuid')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
