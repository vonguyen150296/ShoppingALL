<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products_Model;


class Welcome_Controller extends Controller
{
    public function home(){
    	$new_product = Products_Model::where('new',1)->paginate(8);
    	$promo = Products_Model::where('promotion_price','<>',0)->paginate(8);

    	return view('welcome',compact('new_product','promo'));
    }

    public function intro(){
    	return view('intro');
    }

    public function contact(){
    	return view('contact');
    }

    
}
