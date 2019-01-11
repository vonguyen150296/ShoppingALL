<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Products_Model;
use App\User;
use App\Http\Requests\Register_Request;
use Mail;


class Welcome_Controller extends Controller
{
    public function home(){
    	$new_product = Products_Model::where('new',1)->paginate(8);
    	$promo = Products_Model::where('promotion_price','<>',0)->paginate(8);

    	return view('welcome',compact('new_product','promo'));
    }

    public function intro(){ //afficher page introduction
    	return view('intro');
    }

    public function contact(){ //afficher page contacter
    	return view('contact');
    }

    public function payment(){
        return view('pay');
    }

    public function post_contact(Request $req){
        $input = $req->all();

        $data = array(
            'name' => $req->name,
            'email' =>$req->email,
            'subject'=>$req->subject,
            'content'=>$req->message
        );
        Mail::send('mail.contact', $data, function($message){ 
            $message->from( 'shoppingall@gmail.com', 'ShoppingALL');
            $message->to('nguyen.vo@insa-cvl.fr')->subject('Les commande des clients');
        });

        $success = "Votre message est bien envoyé";

        return view('contact', compact('success'));
    }

    public function login(){ //afficher page se connecter
        return view('login');
    }

    public function post_login(Request $request){ //vérifier lé information de connexe sont correct ou non 

        if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'admin'=>0]) )
        {
            return redirect()->route('myaccount');
        }else{
            $error = "Votre adresse mail ou mot de passe n'est pas correct";
            return view('login', compact('error'));
        }
    }

    public function logout(){ // se déconnecter
        Auth::logout();
        return redirect()->route('home');
    }

    public function signup(){ //afficher page renregistrer 
        return view('signup');
    }

    public function post_signup(Register_Request $req){ //creer une nouveau compte
        do{
            $user_id = mt_rand(100000000,999999999);
            $check = User::where('user_id', $user_id)->get()->first();
        }while($check != null);

        $user = new User();
        $user->name = $req->name;
        $user->subname = $req->subname;
        $user->address = $req->address;
        $user->user_id = $user_id;
        $user->admin = 0;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();
        return view('login');
    }



    
}
