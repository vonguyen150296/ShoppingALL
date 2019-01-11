<?php

use Illuminate\Database\Seeder;

class Carte_Credit_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carte_credit')->insert([
        	['type'=>'Master', 'fullname'=>'NGUYEN VO', 'numero'=>'1234 5648 8457 1245', 'expire'=>'09/2019','signe'=>'584', 'id_user'=>1]
        ]);
    }
}
