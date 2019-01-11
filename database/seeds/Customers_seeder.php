<?php

use Illuminate\Database\Seeder;

class Customers_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
        	['name'=>'TRAN', 'subname'=>'Anh Khoa','email'=>'anh.tran@insa-cvl.fr', 'address'=>'17 Avenue du Maréchal Foch, Blois, France','phone'=>'07 67 17 15 24'],
        	['name'=>'BUI', 'subname'=>'Quoc Anh','email'=>'anh.bui@insa-cvl.fr', 'address'=>'16 Avenue du Maréchal Foch, Blois, France','phone'=>'07 75 12 94 26']
        ]);
    }
}
