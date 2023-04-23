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
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('quantity');
            $table->string('root');
            $table->double('price');
            $table->unsignedInteger('type_of_medicine_id');
            $table->unsignedInteger('manufacturer_id');
            $table->timestamps();
            $table->foreign('type_of_medicine_id')->references('id')->on('type_of_medicines');
            $table->foreign('manufacturer_id')->references('id')->on('manufactureres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
