<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateTableContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partenaire_id')->unsigned();
            $table->string('nom',40)->nullable();
            $table->string('prenom',40)->nullable();
            $table->string('fonction',60)->nullable();
            $table->string('adresse_mail',40)->nullable();
            $table->string('tel',20)->nullable();
            $table->timestamps();
            $table-> foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
