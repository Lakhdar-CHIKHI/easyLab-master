<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('titre', 150)->nullable();
            $table->string('sujet',1000)->nullable();
            $table->string('mots_cle')->nullable();
            $table->string('date_debut',40)->nullable();
            $table->string('date_soutenance',40)->nullable();
            $table->string('detail')->nullable();
            $table->integer('encadreur_ext')->unsigned()->nullable();
            $table->string('coencadreur_int',150)->nullable();
            $table->integer('coencadreur_ext')->unsigned()->nullable();
            $table->string('membre',150)->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
            $table->string('encadreur_int',150)->nullable();
            $table-> foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table-> foreign('encadreur_ext')->references('id')->on('contacts')->onDelete('cascade');
            $table-> foreign('coencadreur_ext')->references('id')->on('contacts')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theses');
    }
}
