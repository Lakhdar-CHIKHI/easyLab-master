<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateTableStages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partenaire_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->datetime('deleted_at')->nullable();
            $table->string('sujet',150)->nullable();
            $table->string('titre',150)->nullable();
            $table->string('detail',255)->nullable();  
            $table-> foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('cascade');
            $table-> foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
