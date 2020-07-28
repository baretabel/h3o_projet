<?php

use Illuminate\Database\Seeder;

class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competences')->insert(array(
            array('competence'=>'Codage'),
            array('competence'=>'Robotique'),
            array('competence'=>'Modélisation 3D'),
            array('competence'=>'Automatisme'),
            array('competence'=>'Usinage, Découpage'),
        ));
    }
}
