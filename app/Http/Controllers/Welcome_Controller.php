<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Register_Request;
use App\Carte_Credit_Model;
use App\Bill_Detail_Model;
use App\Customers_Model;
use App\Products_Model;
use App\Bills_Model;
use App\User;
use App\Cart;
use Session;
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
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalPrice = $cart->totalPrice;
        return view('pay', compact('totalPrice'));
    }

    public function post_payment(){
        $Cart = Session::get('cart');

        //stocker customer 
        $cus = new Customers_Model();
        $cus->name = Auth::user()->name;
        $cus->subname = Auth::user()->subname;
        $cus->email = Auth::user()->email;
        $cus->address = Auth::user()->address;
        $cus->phone = Auth::user()->phone;
        $cus->save(); 

        //stocker in bill
        $bill = new Bills_Model();
        $bill->id_customer =  $cus->id;
        $bill->date_order = date("Y-m-d");
        $bill->total = $Cart->totalPrice;
        $fullname = Carte_Credit_Model::where('id_user', Auth::user()->id)->select('fullname')->get()->first();
        if($fullname){
            $bill->payment = $fullname;
        }else{
            $bill->payment = Auth::user()->name." ".Auth::user()->subname;
        }
        
        $bill->note = 'bien payé';
        $bill->save();

        //stocker bill_detail
        $products = $Cart->items;
        $detail = new Bill_Detail_Model();
        foreach ($products as $value) {
            $detail->id_bill = $bill->id;
            $detail->id_product = $value['item']['id'];
            $detail->quantity = $value['qty'];
            if($value['item']['promotion_price']){
                $detail->unit_price = $value['item']['promotion_price'];
            }else{
                 $detail->unit_price = $value['item']['unit_price'];
            }
            
            $detail->save();
        }
        //reset Cart
        foreach ($products as $value) {
            unset($Cart->items[$value['item']['id']]);  
        }
        $Cart->totalQty= 0;
        $Cart->totalPrice = 0;

        return redirect()->route('home');
        
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
