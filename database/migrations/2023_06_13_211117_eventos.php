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
        Schema::create('eventos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('user');
            $table->text('description')->nullable();
            $table->enum('type',['Falta de conducta','Inasistencia','Retiro']);
            $table->date('date');
            $table->time('hour');
            $table->string('file')->nullable();

            $table->bigInteger('DNI_alumno')->unsigned();
                        
            $table->foreign('DNI_alumno')->references('DNI')->on('alumnos')->onDelete("cascade");
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
