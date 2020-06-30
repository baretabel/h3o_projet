<?php

use Illuminate\Database\Seeder;

class LocaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localites')->insert(array(
            array('localite'=>'Secteur Nord'),
            array('localite'=>'Secteur Est'),
            array('localite'=>'Secteur Ouest'),
            array('localite'=>'Secteur Sud'),
        ));
    }
}
