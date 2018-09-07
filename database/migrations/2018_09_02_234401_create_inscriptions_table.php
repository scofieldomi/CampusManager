<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('etudiant_matricule');
            $table->integer('unite_id')->unsigned();
            $table->integer('annee_id')->unsigned();

            $table->foreign('etudiant_matricule')->references('matricule')->on('etudiants')
                         ->onDelete('restrict')
                         ->onUpdate('restrict');

            $table->foreign('unite_id')->references('id')->on('unites')
                         ->onDelete('restrict')
                         ->onUpdate('restrict');

            $table->foreign('annee_id')
                      ->references('id')
                      ->on('annees')
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
        Schema::table('inscriptions', function(Blueprint $table) {
             $table->dropForeign('inscriptions_etudiant_matricule_foreign');
             $table->dropForeign('inscriptions_unite_id_foreign');
         });
        Schema::dropIfExists('inscriptions');
    }
}
