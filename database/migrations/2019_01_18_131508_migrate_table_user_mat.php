<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateTableUserMat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('id_mat',30);
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table-> foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table-> foreign('id_mat')->references('numero')->on('materiels')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_mat');
    }
}
