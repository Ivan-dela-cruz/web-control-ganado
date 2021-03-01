<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPurcharses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_purcharses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purcharse_id');
            $table->string('description')->nullable();
            $table->integer('quanity')->nullable();
            $table->double('price_unit')->nullable();
            $table->string('price_total')->nullable();
            $table->tinyInteger('status')->nullable()->default(1);
            $table->string('dato1')->nullable();
            $table->string('dato2')->nullable();
            $table->string('dato3')->nullable();
            $table->integer('valor1')->nullable();
            $table->integer('valor2')->nullable();
            $table->double('valor3')->nullable();
            $table->timestamps();
            $table->foreign('purcharse_id')->references('id')->on('purcharses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_purcharses');
    }
}
