<?php

use Illuminate\Database\Seeder;

class Code_Promo_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('code_promo')->insert([
        	['code'=>'GRHDSD','value'=>'5%'],
        	['code'=>'GRSCSD','value'=>'25%'],
        	['code'=>'FDSDSD','value'=>'10%'],
        	['code'=>'GRDDFC','value'=>'5%'],
        	['code'=>'GRSSSS','value'=>'15%'],
        	['code'=>'GRAAAD','value'=>'20%'],
        	['code'=>'GDSADC','value'=>'10%']
        ]);
    }
}
