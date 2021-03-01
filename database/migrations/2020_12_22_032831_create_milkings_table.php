<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milkings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('income_id');
            $table->unsignedBigInteger('animalproduction_id');
            $table->double('total_liters')->nullable()->default(0);
            $table->integer('year')->nullable();
            $table->date('date')->nullable();
            $table->time('hour')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->string('dato1')->nullable();
            $table->string('dato2')->nullable();
            $table->string('dato3')->nullable();
            $table->integer('valor1')->nullable();
            $table->integer('valor2')->nullable();
            $table->double('valor3')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('income_id')->references('id')->on('incomes');
            $table->foreign('animalproduction_id')->references('id')->on('animal_production');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('milkings');
    }
}
