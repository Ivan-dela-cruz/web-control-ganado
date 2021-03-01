<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->morphs('taskeable');
            $table->integer('estate_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->time('hour')->nullable();
            $table->enum('status',['Pendiente','Finalizada'])->default('Pendiente');
            $table->string('dato1')->nullable();
            $table->string('dato2')->nullable();
            $table->string('dato3')->nullable();
            $table->integer('valor1')->nullable();
            $table->integer('valor2')->nullable();
            $table->double('valor3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
