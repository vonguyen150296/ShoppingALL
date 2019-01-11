<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carte_Credit_Model extends Model
{
    protected $table = "carte_credit";

    public function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }
}
