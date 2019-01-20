<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateTableEquipeMat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe_mat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_equipe')->unsigned();
            $table->string('id_materiel',30);
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table-> foreign('id_equipe')->references('id')->on('equipes')->onDelete('cascade');
            $table-> foreign('id_materiel')->references('numero')->on('materiels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipe_mat');
    }
}
