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
        Schema::create('familiars', function (Blueprint $table) {
            $table->engine="InnoDB";         
            $table->timestamps();

            $table->bigInteger('DNI')->unsigned();
            $table->string('names');
            $table->string('lastName');
            $table->bigInteger('tel');
            $table->string('mail')->nullabe($value=true);
            
            //Domicilio
            $table->string('nation');
            $table->string('jurisdiction');
            $table->string('department');
            $table->string('locality');
            $table->string('direction');

            //Primary key
            $table->primary('DNI');
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
