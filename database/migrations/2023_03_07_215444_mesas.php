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
        Schema::create('mesas', function (Blueprint $table) {
            //Standard data
            $table->engine="InnoDB";
            $table->bigIncrements('id');            
            $table->timestamps();

            //Mesa data
            $table->string('Proffesor');
            $table->date('Date');

            //Foreign data
            $table->bigInteger('id_exam')->unsigned();

            //Foreign logic
            $table->foreign('id_exam')->references('id')->on('exams')->onDelete("cascade");

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
