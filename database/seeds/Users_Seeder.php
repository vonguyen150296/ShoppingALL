<?php

use Illuminate\Database\Seeder;

class Users_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	['name'=>'VO', 'subname'=>'Nguyen', 'address'=>'15 Avenue du Maréchal Foch, Blois, France', 'phone'=>'07 67 17 94 26', 'user_id'=>'9664514525','admin'=>true, 'email'=>'nguyen.vo@insa-cvl.fr','password'=>bcrypt('vonguyen123'), 'created_at'=>'2018-12-12 00:00:00']
        ]);
    }
}
