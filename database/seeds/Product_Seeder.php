<?php

use Illuminate\Database\Seeder;

class Product_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	['id'=>1,'name'=>"Les Crepes",'id_type'=>1,'description'=>'','unit_price'=>10,'promotion_price'=>8,'image'=>'crepe_0001.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>2,'name'=>'Les crepes au chocolate','id_type'=>1,'description'=>'','unit_price'=>11,'promotion_price'=>9,'image'=>'crepe_chocolat.jpg','unit'=>'boîte','new'=>1,'created_at'=>"2016-10-26"],
        	['id'=>3,'name'=>'Les crepes de pommes','id_type'=>1,'description'=>'','unit_price'=>12,'promotion_price'=>0,'image'=>'crepe_pommes.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>4,'name'=>'Les crepes Tea ','id_type'=>1,'description'=>'','unit_price'=>13,'promotion_price'=>0,'image'=>'crepe_tea.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>5,'name'=>'Les crepes de bananas ','id_type'=>1,'description'=>'','unit_price'=>15,'promotion_price'=>0,'image'=>'crepee_bananas.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>6,'name'=>'Les crepes de pêche','id_type'=>1,'description'=>'','unit_price'=>17,'promotion_price'=>10,'image'=>'crepe-peche.jpg','unit'=>'boîte','new'=>1,'created_at'=>"2016-10-26"],
        	['id'=>7,'name'=>'Les crepes des fraises','id_type'=>1,'description'=>'','unit_price'=>7,'promotion_price'=>0,'image'=>'crepes_frais.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>8,'name'=>'Le gâteau foret noire','id_type'=>2,'description'=>'','unit_price'=>20,'promotion_price'=>15,'image'=>'foret-noire-le-gateau.jpg','unit'=>'pièce','new'=>1,'created_at'=>"2016-10-26"],
        	['id'=>9,'name'=>'Le gâteau moelleux aux noix ','id_type'=>2,'description'=>'','unit_price'=>18,'promotion_price'=>15,'image'=>'gateau-moelleux-aux-noix-cafe.jpg','unit'=>'pièce','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>10,'name'=>'Le gâteau des rois','id_type'=>2,'description'=>'','unit_price'=>25,'promotion_price'=>0,'image'=>'gateau_des_rois.jpg','unit'=>'pièce','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>11,'name'=>'Le gâteau basque surgéles','id_type'=>2,'description'=>'','unit_price'=>22,'promotion_price'=>0,'image'=>'le-gateau-basque-surgeles.jpg','unit'=>'pièce','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>12,'name'=>'Le gâteau pavlova','id_type'=>2,'description'=>'','unit_price'=>19,'promotion_price'=>0,'image'=>'le-gateau-pavlova.jpg','unit'=>'pièce','new'=>1,'created_at'=>"2016-10-26"],
        	['id'=>13,'name'=>'Le choux à la crème','id_type'=>3,'description'=>'','unit_price'=>8,'promotion_price'=>0,'image'=>'choux-a-la-creme.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>14,'name'=>'Le coeur choux','id_type'=>3,'description'=>'','unit_price'=>7,'promotion_price'=>5,'image'=>'coeur-choux.jpg','unit'=>'boîte','new'=>1,'created_at'=>"2016-10-26"],
        	['id'=>15,'name'=>'Le pâte à choux','id_type'=>3,'description'=>'','unit_price'=>10,'promotion_price'=>0,'image'=>'pate-a-choux.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>16,'name'=>'Le gabriella','id_type'=>4,'description'=>'','unit_price'=>8,'promotion_price'=>0,'image'=>'gabriella.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>17,'name'=>'Le pizza benfica','id_type'=>4,'description'=>'','unit_price'=>10,'promotion_price'=>8,'image'=>'pizza_benfica.jpg','unit'=>'boîte','new'=>1,'created_at'=>"2016-10-26"],
        	['id'=>18,'name'=>"Le pizza de l'oustal",'id_type'=>4,'description'=>'','unit_price'=>12,'promotion_price'=>0,'image'=>"pizza_de_l'oustal.jpg",'unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>19,'name'=>'Les biscuits au beurre','id_type'=>5,'description'=>'','unit_price'=>8,'promotion_price'=>0,'image'=>'Biscuits_au_beurre.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>20,'name'=>'Les biscuits bretons','id_type'=>5,'description'=>'','unit_price'=>10,'promotion_price'=>0,'image'=>'Les_biscuit_bretons.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
        	['id'=>21,'name'=>'Les biscuits maison','id_type'=>5,'description'=>'','unit_price'=>12,'promotion_price'=>10,'image'=>'Les_biscuits_maison.jpg','unit'=>'boîte','new'=>1,'created_at'=>"2016-10-26"],
        	['id'=>22,'name'=>'Les biscuits montbozon','id_type'=>5,'description'=>'','unit_price'=>11,'promotion_price'=>0,'image'=>'Les_biscuits_montbozon.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
            ['id'=>23,'name'=>'Macaron - Les biscuits de louise','id_type'=>5,'description'=>'','unit_price'=>9,'promotion_price'=>7,'image'=>'Macaron_Les_biscuits_de_louise.jpg','unit'=>'boîte','new'=>0,'created_at'=>"2016-10-26"],
            ['id'=>24,'name'=>'Spritz - Les biscuits sables au beurre','id_type'=>5,'description'=>'','unit_price'=>7,'promotion_price'=>0,'image'=>'spritz_les_biscuits_sables_au_beurre.png','unit'=>'boîte','new'=>1,'created_at'=>"2016-10-26"]
        ]);
    }
}
