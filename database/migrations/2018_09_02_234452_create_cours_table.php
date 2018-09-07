<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('module_id')->unsigned();
            $table->integer('enseignant_id')->unsigned();
            $table->integer('annee_id')->unsigned();


            $table->foreign('module_id')->references('id')->on('modules')
                         ->onDelete('restrict')
                         ->onUpdate('restrict');

            $table->foreign('enseignant_id')->references('id')->on('enseignants')
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
         Schema::table('cours', function(Blueprint $table) {
             $table->dropForeign('cours_module_id_foreign');
             $table->dropForeign('cours_enseignant_id_foreign');
         });
        Schema::dropIfExists('cours');
    }
}
