<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Products_Model extends Model
{
    protected $table = "type_products";

    public function product(){
    	return $this->hasMany('App\Products_Model','id_type','id');
    }
}
