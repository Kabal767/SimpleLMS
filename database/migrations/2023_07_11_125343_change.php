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
        //
        Schema::create('changes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');            
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('object_id')->unsigned();
            
            //Foreign logic
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");

            $table->enum('type',['Nuevo Alumno','Modificar Alumno','Borrar Alumno','Evento Alumno','Crear relación familiar Alumno','Añadir materia pendiente','Modificar materia de alumno',
        'Promocionar alumno','Egresar alumno','Registrar abandono de alumno','Reasignar alumno','Reingreso de alumno',
        'Nuevo Familiar','Modificar Familiar','Borrar Familiar','Nueva materia','Borrar Materia','Nuevo curso','Modificar curso','Borrar curso',
        'Nuevo examen','Nueva mesa','Borrar examen','Borrar mesa','Registrar alumno a examen','Modificar nota de examen','Eliminar alumno del examen','Cerrar examen']);
        });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
