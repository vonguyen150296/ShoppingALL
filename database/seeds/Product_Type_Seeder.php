<?php

use Illuminate\Database\Seeder;

class Product_Type_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_products')->insert([
        	['id'=>1,'name'=>'Les Crepes', 'description'=>"La crêpe est un mets composé d'une très fine couche de pâte faite à base de farine (principalement de blé ou de sarrasin) et d'œufs agglomérés à un liquide (lait, parfois mélangé à de l'eau ou de la bière). Elle est généralement de forme ronde.",'image'=>'crepe_0001.jpg','created_at'=>'2018-11-26'],
        	['id'=>2,'name'=>'Les Gâteaux', 'description'=>"Un gâteau est une pâtisserie préparée d'une pâte sucrée à base de farine, d'œufs et de beurre. Il doit être cuit au four, généralement dans un moule. Il peut être garni de crème, de fruits, de chocolat ou de glaçage. De plus, il se mange fréquemment à la fin du repas soit au dessert et au goûter. Le gâteau est généralement de forme ronde, carrée ou rectangulaire et plutôt plate.",'image'=>'gateau_des_rois.jpg','created_at'=>'2018-11-26'],
        	['id'=>3,'name'=>'Les Choux', 'description'=>"La pâte à choux est une pâte complexe, cuite en deux temps, utilisée en pâtisserie pour de nombreuses réalisations sucrées (chou à la crème, éclair, religieuse, Saint Honoré…) ou salées (gougères, pommes dauphines…).",'image'=>'pate_a_choux.jpg','created_at'=>'2018-11-26'],
        	['id'=>4,'name'=>'Les Pizzas', 'description'=>"La pizza est une recette de cuisine traditionnelle de la cuisine italienne, originaire de Naples en Italie (cuisine napolitaine) à base de galette de pâte à pain, garnie de divers mélanges d’ingrédients (sauce tomate, tomates séchées, légumes, fromage, charcuterie, olives, huile d'olive…) et cuite au four.",'image'=>'pizza_benfica.jpg','created_at'=>'2018-11-26'],
        	['id'=>5,'name'=>'Les Biscuits', 'description'=>"Contrairement aux gâteaux, les biscuits ont généralement une texture plus croquante ou croustillante, on dit qu’ils sont « secs ». Biscuit à la cuillère, biscuit rose de Reims, boudoir, cookie, crêpe dentelle, financier, galette bretonne, gaufre, gaufrette, macaron d’Amiens, meringue, palet breton, palmier, Petit Beurre, sablé, spéculoos, tartelette, tuiles aux amandes.",'image'=>'Biscuits_au_beurre.jpg','created_at'=>'2018-11-26']
        ]);
    }
}
