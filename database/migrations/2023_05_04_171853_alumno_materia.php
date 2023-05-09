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
            $table->bigIncrements('id');            
            $table->timestamps();
            $table->integer('callification')->default(0);
            $table->enum('condition', ['coursing', 'pending', 'done'])->default('coursing');
            $table->date('year')->default('2000-01-01');

            //Foreign keys
            $table->bigInteger('alumno_id')->unsigned();
            $table->bigInteger('materia_id')->unsigned();

            //Foreign logic
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete("cascade");
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
