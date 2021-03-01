<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('ruc')->nullable();
            $table->string('owner')->nullable();
            $table->string('url_image')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('status')->nullable()->default(1);
            $table->string('dato1')->nullable();
            $table->string('dato2')->nullable();
            $table->string('dato3')->nullable();
            $table->integer('valor1')->nullable();
            $table->integer('valor2')->nullable();
            $table->double('valor3')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('companies');
    }
}
