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
        Schema::create('detalle_compras', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('compra_id')->nullable();
    $table->unsignedBigInteger('producto_id')->nullable();
    $table->integer('cantidad')->nullable();
    $table->decimal('precio_unitario', 10, 2)->nullable();
    $table->timestamps();

    $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
    $table->foreign('producto_id')->references('id')->on('productos')->onDelete('set null');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
