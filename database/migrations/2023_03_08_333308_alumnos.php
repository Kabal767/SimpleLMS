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
            $table->timestamps();

            //Alumno data
            $table->bigInteger('DNI')->unsigned();
            $table->string('name');
            $table->string('lastName');
            $table->enum('sex', ['Masculino','Femenino']);
            $table->date('birthDate');

            //Domicilio
            $table->string('nation');
            $table->string('jurisdiction');
            $table->string('department');
            $table->string('locality');
            $table->string('direction');

            //Birth data
            $table->string('birthNation');
            $table->string('birthJurisdiction');
            $table->string('birthDepartment');
            $table->string('birthLocality');


            //Datos de contacto
            $table->bigInteger('tel')->unsigned();
            $table->string('mail')->nullable($value = true);

            //Historia académica
            $table->string('origin')->nullable($value = true);
            $table->date('lastYear')->nullable($value = true);
            $table->string('originNation')->nullable($value = true);
            $table->string('originJurisdiction')->nullable($value = true);
            $table->string('originDepartment')->nullable($value = true);
            $table->string('originLocality')->nullable($value = true);
            $table->string('originDirection')->nullable($value = true);

            //Curso [Foreign data]
            $table->bigInteger('id_curso')->unsigned();

            $table->primary('DNI');

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
