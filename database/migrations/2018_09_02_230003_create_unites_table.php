<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unites', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('cycle_id')->unsigned();
            $table->integer('filiere_id')->unsigned();
            $table->integer('semestre_id')->unsigned();

            $table->string('code');
            $table->string('intitule');

            
            $table->foreign('cycle_id')
                      ->references('id')
                      ->on('cycles')
                      ->onDelete('restrict')
                      ->onUpdate('restrict');

            
            $table->foreign('filiere_id')
                      ->references('id')
                      ->on('filieres')
                      ->onDelete('restrict')
                      ->onUpdate('restrict');

        
            $table->foreign('semestre_id')
                      ->references('id')
                      ->on('semestres')
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
        Schema::dropIfExists('u_vs');
    }
}
