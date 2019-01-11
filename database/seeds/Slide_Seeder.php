<?php

use Illuminate\Database\Seeder;

class Slide_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slide')->insert([
        	['name'=>'Biscuits Citron','image'=>'banner1.jpg'],
        	['name'=>'Les Gâteaux Crèmes','image'=>'banner2.jpg'],
        	['name'=>'Les Biscuits Crèmes','image'=>'banner3.jpg'],
        	['name'=>'Les Chocolates','image'=>'banner4.jpg']
        ]);
    }
}
