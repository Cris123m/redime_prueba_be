<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['ACTIVO', 'CANCELADO', 'ELIMINADO'])->default('ACTIVO');
            $table->string('nombre', 50);
            $table->text('descripcion');
            $table->decimal('stock_minimo', 10, 2);
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->timestamp('creado_a')->useCurrent();
            $table->timestamp('actualizado_a')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiales');
    }
}