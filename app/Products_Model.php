<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_Model extends Model
{
    protected $table = "products";

    public function type_product(){
    	return $this->belongsTo('App\Type_Products_Model','id_type','id');
    } 

    public function bill_detail(){
    	return $this->belongsToMany('App\Bill_Detail_Model','id_product','id');
    }
}
