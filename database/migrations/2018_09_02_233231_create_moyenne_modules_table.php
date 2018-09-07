<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoyenneModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyenne_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id')->unsigned();
            $table->integer('annee_id')->unsigned();
            $table->string('etudiant_matricule');
            $table->integer('module_id')->unsigned();

            $table->float('moyenne', 8, 2);
          
            $table->foreign('session_id')
                      ->references('id')
                      ->on('sessions')
                      ->onDelete('restrict')
                      ->onUpdate('restrict');

            
            $table->foreign('annee_id')
                      ->references('id')
                      ->on('annees')
                      ->onDelete('restrict')
                      ->onUpdate('restrict');

            
            $table->foreign('etudiant_matricule')->references('matricule')->on('etudiants')
                         ->onDelete('restrict')
                         ->onUpdate('restrict');

            $table->foreign('module_id')->references('id')->on('modules')
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
         Schema::table('moyenne_modules', function(Blueprint $table) {
             $table->dropForeign('moyenne_modules_etudiant_matricule_foreign');
             $table->dropForeign('moyenne_modules_module_id_foreign');
         });
        Schema::dropIfExists('moyenne_modules');
    }
}
