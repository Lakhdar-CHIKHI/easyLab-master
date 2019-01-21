<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParemetresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('propos',2000)->nullable();
            $table->string('lieu',500)->nullable();
            $table->string('mail',50)->nullable();
            $table->string('tel',50)->nullable();
            $table->string('fax',50)->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            
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
        Schema::dropIfExists('parametres');
    }
}
