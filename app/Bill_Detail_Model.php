<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_Detail_Model extends Model
{
    protected $table = "bill_detail";

    public function bills(){
    	return $this->hasOne('App\Bills_Model','id_bill','id');
    }

    public function product(){
    	return $this->belongsToMany('App\Products_Model','id_product','id');
    }
}
