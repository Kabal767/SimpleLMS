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
        Schema::create('alumno_exam', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');            
            $table->timestamps();

            $table->boolean('boolOral');
            $table->integer('oral')->default(0);
            $table->boolean('boolWritten');
            $table->integer('written')->default(0);
            $table->integer('callification')->default(0);
            $table->enum('condition', ['Cursando','Aprobado','Desaprobado'])->default('Cursando');

            $table->bigInteger('mesa_id')->unsigned();
            $table->bigInteger('alumno_DNI')->unsigned();
            $table->bigInteger('exam_id')->unsigned();

            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete("cascade");
            $table->foreign('alumno_DNI')->references('DNI')->on('alumnos')->onDelete("cascade");
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete("cascade");
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
