<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('institut_id')->unsigned()->nullable();
            $table->integer('departement_id')->unsigned()->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email');

            $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('restrict')
                      ->onUpdate('restrict');

            $table->foreign('institut_id')
                      ->references('id')
                      ->on('instituts')
                      ->onDelete('restrict')
                      ->onUpdate('restrict');

            $table->foreign('departement_id')
                      ->references('id')
                      ->on('departements')
                      ->onDelete('restrict')
                      ->onUpdate('restrict');

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
        Schema::dropIfExists('enseignants');
    }
}
