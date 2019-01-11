<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Type_Products_Model;
use App\Carte_Credit_Model;
use App\Products_Model;
use App\User;
use App\Cart;
use Session;

class Myaccount_Controller extends Controller
{
    public function myaccount(){ //show page account
    	if(Auth::check()){
    		$type_product = Type_Products_Model::all();
    		$fullname = Auth::user()->subname.Auth::user()->name;
    		return view('myaccount.layouts.index', compact('fullname', 'type_product'));
    	}
    }

    //************************profile page*******************************///
    public function infos($user_id){ //show information of user
    	$infos = User::where('user_id', $user_id)->select('name','subname','address','phone','email')->get()->first();
    	return $infos;
    }

    public function update_infos(Request $request, $user_id){ //update information of user
        User::where('user_id',$user_id)
                        ->update(['name'=> $request->name,
                            'subname'=> $request->subname,
                            'phone'=> $request->phone,
                            'email'=> $request->email,
                            'address'=> $request->address]);
        if(!empty($request->password)){
            User::where('user_id',$user_id)->update(['password'=>bcrypt($request->password)]);
        }
        $update = 'true';
        return $update;
    }

    /////////////************************purchasses page***********************//
    public function purchases(){ //show the product in the cart
        if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
        }else{
            $cart = null;
        }

        $purchases['product_cart'] = $cart->items;
        $purchases['totalPrice'] = $cart->totalPrice;

        return $purchases;
    }

     public function delete_item($id){ //remove one item with quality > 1
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        $purchases = $this->purchases();

        return $purchases;
    }

    public function delete_by_one($id){ //remove one product of item
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart',$cart);
        $purchases = $this->purchases();

        return $purchases;
    }

    public function add_to_cart(Request $req, $id){ //add one product in cart
        $product = Products_Model::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->Session('cart')->put('cart',$cart);
        $purchases = $this->purchases();

        return $purchases;
    }

    /////******************payment page*********************/
    public function carte_credit($user_id){ //show the carte credit of user
        $carte = DB::table('users')->where('users.user_id',$user_id)
                                ->join('carte_credit', 'users.id', '=', 'carte_credit.id_user')
                                ->select('carte_credit.fullname', 'carte_credit.numero', 'carte_credit.type','carte_credit.id')->get();
        return $carte;
    }

    public function add_carte_credit(Request $req, $user_id){ //add an the carte credit of user
        $id = User::where('user_id',$user_id)->select('id')->get()->first();
        $new = new Carte_Credit_Model();
        $new->fullname = $req->fullname;
        $new->numero = $req->numero;
        $new->expire =$req->expire;
        $new->signe =$req->sign;
        $new->type =$req->type;
        $new->id_user = $id->id;
        $new->save();

        $carte = Carte_Credit_Model::where('id_user', $id->id)->select('id','fullname', 'numero', 'type')->get();
        return $carte;
    }

    public function delete_carte($id,$user_id){
        Carte_Credit_Model::where('id',$id)->delete();
        $id = User::where('user_id',$user_id)->select('id')->get()->first();
        $carte = Carte_Credit_Model::where('id_user', $id->id)->select('fullname', 'numero', 'type','id')->get();
        return $carte;
    }
}
