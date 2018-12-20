<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Type_Products_Model;

class Myaccount_Controller extends Controller
{
    public function myaccount(){
    	if(Auth::check()){
    		$type_product = Type_Products_Model::all();
    		$fullname = Auth::user()->subname.Auth::user()->name;
    		return view('myaccount.layouts.index', compact('fullname', 'type_product'));
    	}
    }
}
