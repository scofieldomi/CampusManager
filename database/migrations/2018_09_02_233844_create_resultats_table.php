<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultats', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->float('moyenne', 8, 2);
            $table->integer('rang');
            $table->string('decision');
            $table->string('mention');
            $table->string('etudiant_matricule');
            $table->integer('annee_id')->unsigned();
            $table->integer('cycle_id')->unsigned();
            $table->integer('filiere_id')->unsigned();
            $table->integer('semestre_id')->unsigned();
            $table->integer('session_id')->unsigned();

   
            $table->foreign('annee_id')
                      ->references('id')
                      ->on('annees')
                      ->onDelete('restrict')
                      ->onUpdate('restrict');

            $table->foreign('etudiant_matricule')
                  ->references('matricule')
                  ->on('etudiants')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
           
            
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

          
            $table->foreign('session_id')
                      ->references('id')
                      ->on('sessions')
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
        Schema::dropIfExists('resultats');
    }
}
