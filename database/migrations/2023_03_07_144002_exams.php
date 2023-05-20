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
        Schema::create('exams', function (Blueprint $table) {
            //Standard data
            $table->engine="InnoDB";
            $table->bigIncrements('id');            
            $table->timestamps();

            //Datos de examen
            $table->enum('condition', ['Final', 'Diciembre', 'Regular', 'Adeudada'])->default('Final');

            //Foreign data
            $table->bigInteger('materia_id')->unsigned();
            $table->bigInteger('curso_id')->unsigned()->nullable($value = true);

            //Foreign logic
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete("cascade");
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
