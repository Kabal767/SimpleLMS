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
        //This is a JUNCTION TABLE
        Schema::create('alumno_materia', function (Blueprint $table) {
            //Standard data
            $table->engine="InnoDB";          
            $table->timestamps();

            $table->string('origin');
            $table->integer('quarter1')->default(0);
            $table->integer('quarter2')->default(0);
            $table->integer('quarter3')->default(0);
            $table->integer('average')->default(0);
            $table->integer('callification')->default(0);
            $table->enum('condition', ['Cursando', 'En Proceso', 'Aprobada'])->default('Cursando');
            $table->year('year');

            //Foreign keys
            $table->bigInteger('alumno_DNI')->unsigned();
            $table->bigInteger('materia_id')->unsigned();
            
            $table->primary(['alumno_DNI','materia_id']);

            //Foreign logic
            $table->foreign('alumno_DNI')->references('DNI')->on('alumnos')->onDelete("cascade");
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete("cascade");

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
