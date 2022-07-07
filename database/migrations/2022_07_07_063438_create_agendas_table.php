<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',64);
            $table->string('paterno',64);
            $table->string('materno',64);
            $table->string('Direccion',64);
            $table->string('Telefono',64);
            $table->string('Correo',64);
            $table->unsignedBigInteger('usuario_id')->nullable();

            $table->timestamps();

            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('set null');
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
};
