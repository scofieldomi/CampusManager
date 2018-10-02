<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('institut_id')->unsigned();
            $table->string('intitule');
            $table->timestamps();

            $table->foreign('institut_id')
                  ->references('id')
                  ->on('instituts')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departements');
    }
}
