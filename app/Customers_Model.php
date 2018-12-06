<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers_Model extends Model
{
    protected $table = "customers";

    public function bills(){
    	return $this->hasMany('App\Bills_Model', 'id_customer', 'id');
    }
}
