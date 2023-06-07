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
            $table->timestamps();

            $table->enum('relation', ['Padre', 'Madre', 'Tutor', 'Abuelo', 'Abuela']);

            $table->bigInteger('alumno_DNI')->unsigned();
            $table->bigInteger('familiar_DNI')->unsigned();

            //Foreign logic
            $table->foreign('alumno_DNI')->references('DNI')->on('alumnos')->onDelete("cascade");
            $table->foreign('familiar_DNI')->references('DNI')->on('familiars')->onDelete("cascade");

            $table->primary(['alumno_DNI','familiar_DNI']);
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
