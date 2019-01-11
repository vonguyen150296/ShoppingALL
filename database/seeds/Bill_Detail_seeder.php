<?php

use Illuminate\Database\Seeder;

class Bill_Detail_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_detail')->insert([
        	['id_bill'=>1, 'id_product'=>2, 'quantity'=>2, 'unit_price'=>'9'],
        	['id_bill'=>1, 'id_product'=>3, 'quantity'=>2, 'unit_price'=>'12'],
        	['id_bill'=>1, 'id_product'=>4, 'quantity'=>5, 'unit_price'=>'13'],
        	['id_bill'=>2, 'id_product'=>6, 'quantity'=>2, 'unit_price'=>'10'],
        	['id_bill'=>2, 'id_product'=>7, 'quantity'=>2, 'unit_price'=>'7'],
        	['id_bill'=>2, 'id_product'=>8, 'quantity'=>5, 'unit_price'=>'15'],
            ['id_bill'=>3, 'id_product'=>2, 'quantity'=>1, 'unit_price'=>'9'],
            ['id_bill'=>4, 'id_product'=>3, 'quantity'=>2, 'unit_price'=>'12'],
            ['id_bill'=>4, 'id_product'=>4, 'quantity'=>1, 'unit_price'=>'13'],
            ['id_bill'=>3, 'id_product'=>6, 'quantity'=>1, 'unit_price'=>'10'],
            ['id_bill'=>3, 'id_product'=>7, 'quantity'=>4, 'unit_price'=>'7'],
            ['id_bill'=>4, 'id_product'=>8, 'quantity'=>1, 'unit_price'=>'15']
        ]);
    }
}
