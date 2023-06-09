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
        Schema::create('alumno_curso', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');            
            $table->timestamps();

            $table->enum('condition', ['cursando', 'promocionado']);
            $table->date('year');
            $table->integer('inasistencias')->default(0);

            $table->bigInteger('alumno_DNI')->unsigned();
            $table->bigInteger('curso_id')->unsigned();

            $table->foreign('alumno_DNI')->references('DNI')->on('alumnos')->onDelete("cascade");
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete("cascade");
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
