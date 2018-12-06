<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills_Model extends Model
{
    protected $table = "bills";

    public function customers(){
    	return $this->belongsTo('App\Customers_Model','id_customer','id');
    }

    public function bill_detail(){
    	return $this->hasOne('App\Bill_Detail_Model', 'id_bill','id');
    }
}
