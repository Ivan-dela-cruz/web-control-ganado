<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMastitisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastitis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_production_id');
            $table->unsignedBigInteger('treatment_id');
            $table->string('tipe_mastitis')->nullable();
            $table->string('description')->nullable();
            $table->string('level')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('treatment_id')->references('id')->on('treatments');
            $table->foreign('animal_production_id')->references('id')->on('animal_production');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mastitis');
    }
}
