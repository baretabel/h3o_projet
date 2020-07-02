<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerritoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territoires', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->integer('projet_id');
=======
            $table->integer('acteur_id');
>>>>>>> 7acc08665348e98051ccb016f23565620de34f7e
            $table->integer('localite_id');
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
        Schema::dropIfExists('territoires');
    }
}
