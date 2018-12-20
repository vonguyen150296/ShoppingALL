<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(){
        return view('login');
    }

    public function post_login(Request $request){

        if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'admin'=>0]) )
        {
            return redirect()->route('myaccount');
        }else{
            $error = "Votre adresse mail ou mot de passe n'est pas correct";
            return view('login', compact('error'));
        }
    }

    public function signup(){
        return view('signup');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    
}
