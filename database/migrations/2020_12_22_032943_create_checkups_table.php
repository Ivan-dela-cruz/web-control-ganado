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
            $table->unsignedBigInteger('veterinarie_id');
            $table->string('topic')->nullable();
            $table->string('description')->nullable();
            $table->date('date')->nullable(); 
            $table->string('disease')->nullable();     
            $table->date('next_date')->nullable();    
            $table->boolean('status')->nullable()->default(true);
            $table->string('dato1')->nullable();
            $table->string('dato2')->nullable();
            $table->string('dato3')->nullable();
            $table->integer('valor1')->nullable();
            $table->integer('valor2')->nullable();
            $table->double('valor3')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('animal_id')->references('id')->on('animals');
            $table->foreign('veterinarie_id')->references('id')->on('veterinaries');
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
