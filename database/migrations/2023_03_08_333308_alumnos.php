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
        Schema::create('alumnos', function (Blueprint $table) {
            //Standard data
            $table->engine="InnoDB";
            $table->bigIncrements('id');            
            $table->timestamps();

            //Alumno data
            $table->integer('DNI');
            $table->string('name');
            $table->string('lastName');
            $table->enum('sex', ['Masculino','Femenino']);
            $table->date('birthDate');

            //Datos de contacto
            $table->bigInteger('tel');
            $table->string('locality');
            $table->string('direction');

            //Historia
            $table->string('birthPlace');
            $table->string('origin');
            $table->string('nation');

            //Curso [Foreign data]
            $table->bigInteger('id_curso')->unsigned();

            //Foreign logic
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete("cascade");
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
