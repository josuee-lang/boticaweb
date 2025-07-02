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
        Schema::create('almacens', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('producto_id')->nullable();
    $table->double('precio_anterior')->nullable();
    $table->double('nuevo_precio')->nullable();
    $table->dateTime('fecha_cambio')->nullable();
    $table->timestamps();

    $table->foreign('producto_id')->references('id')->on('productos')->onDelete('set null');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacens');
    }
};
