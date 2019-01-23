<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateTableContactProjet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_projet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projet_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->timestamps();
            $table-> foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table-> foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_projet');
    }
}
