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
        Schema::create('infor_dentists', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('dentist_uuid');
            $table->string('description');
            $table->string('avatar');
            $table->timestamps();
            $table->foreign('dentist_uuid')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infor_dentists');
    }
};
