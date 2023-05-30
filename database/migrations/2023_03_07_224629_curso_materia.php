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
        //This is a JUNCTION TABLE
        Schema::create('curso_materia', function (Blueprint $table) {
            //Standard data
            $table->engine="InnoDB";        
            $table->timestamps();

            //Foreign keys
            $table->bigInteger('curso_id')->unsigned();
            $table->bigInteger('materia_id')->unsigned();

            //Foreign logic
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete("cascade");
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete("cascade");

            //Indexes
            $table->primary(['curso_id', 'materia_id']);
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
