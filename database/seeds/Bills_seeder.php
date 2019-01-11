<?php

use Illuminate\Database\Seeder;

class Bills_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('bills')->insert([
	   ['id_customer'=>1, 'date_order'=>'2018-12-12 00:00:00','total'=>'107', 'payment'=>'NGUYEN VO','note'=>'ok'],
       ['id_customer'=>2, 'date_order'=>'2018-12-12 00:00:00','total'=>'109', 'payment'=>'ANH TRAN','note'=>'ok'],
       ['id_customer'=>1, 'date_order'=>'2018-12-12 00:00:00','total'=>'47', 'payment'=>'NGUYEN VO','note'=>'ok'],
       ['id_customer'=>2, 'date_order'=>'2018-12-12 00:00:00','total'=>'52', 'payment'=>'ANH TRAN','note'=>'ok']
    ]);
    }
}
