<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnimalTreatments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('animaltreatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('animal_disease_id');
            $table->unsignedBigInteger('treatment_id');
            $table->string('doctor_name')->nullable();
            $table->date('date')->nullable(); 
            $table->string('disease')->nullable();     
            $table->time('time_treatment')->nullable();    
            $table->double('price')->default(0); 
            $table->string('Description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('animal_id')->references('id')->on('animals');
            $table->foreign('animal_disease_id')->references('id')->on('animal_diseases');
            $table->foreign('treatment_id')->references('id')->on('treatments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('animaltreatments');
    }
}
