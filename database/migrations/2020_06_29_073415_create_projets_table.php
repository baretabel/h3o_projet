<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fiche_id')->nullable();
            $table->string('categorie');
            $table->string('nom_projet');
            $table->text('contexte');
            $table->text('but');
            $table->text('objectif');
            $table->text('livrable');
            $table->date('debut');
            $table->date('fin');
            $table->text('public');
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
        Schema::dropIfExists('projets');
    }
}
