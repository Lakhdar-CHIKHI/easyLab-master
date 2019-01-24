<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateTablePartenaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',40)->nullable();
            $table->string('type',40)->nullable();
            $table->string('pays',40)->nullable();
            $table->string('ville',40)->nullable();
            $table->string('logo',40)->nullable();
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
        
            Schema::dropIfExists('partenaires');
        
    }
}
