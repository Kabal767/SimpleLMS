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
        Schema::create('alumno_familiar', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');            
            $table->timestamps();

            $table->enum('relation', ['Padre', 'Madre', 'Tutor', 'Abuelo', 'Abuela']);

            $table->bigInteger('alumno_DNI')->unsigned();
            $table->bigInteger('familiar_id')->unsigned();

            //Foreign logic
            $table->foreign('alumno_DNI')->references('DNI')->on('alumnos')->onDelete("cascade");
            $table->foreign('familiar_id')->references('id')->on('familiars')->onDelete("cascade");
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
