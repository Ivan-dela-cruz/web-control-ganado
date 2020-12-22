<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estate_id');
            $table->unsignedBigInteger('company_id');
            $table->string('ruc')->nullable();
            $table->string('driver')->nullable();
            $table->integer('year')->nullable();
            $table->date('date')->nullable();
            $table->time('hour')->nullable();
            $table->integer('total_liters')->nullable();
            $table->string('description')->nullable();
            $table->enum('type',['morning','afternoon'])->default('morning');
            $table->tinyInteger('status')->nullable()->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('estate_id')->references('id')->on('estates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
