<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('veteninarie_id');
            $table->string('doctor_name')->nullable();
            $table->date('date')->nullable(); 
            $table->string('disease')->nullable();     
            $table->date('next_date')->nullable();    
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('animal_id')->references('id')->on('animals');
            $table->foreign('veteninarie_id')->references('id')->on('veteninaries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkups');
    }
}
