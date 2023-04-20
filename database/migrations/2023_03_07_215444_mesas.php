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
            $table->bigInteger('examns_id')->unsigned();

            //Foreign logic
            $table->foreign('examns_id')->references('id')->on('exams')->onDelete("cascade");

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
