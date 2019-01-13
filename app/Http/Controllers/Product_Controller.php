<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products_Model;
use App\Type_Products_Model;
use App\Cart;
use App\Code_Promo_Model;
use Session;

class Product_Controller extends Controller
{
    public function product($id){ //render view product with id
    	$product = Products_Model::find($id);
    	$related_product = Products_Model::where('id_type',$product->id_type)->paginate(3);
    	$new=Products_Model::where('new',1)->take(7)->get();
    	return view('product',compact('product','related_product','new'));
    }

    public function product_type($id){ //render view type product
    	$type = Type_Products_Model::all();
    	$new_product = Products_Model::where('id_type',$id)->where('new',1)->get();
    	$product = Products_Model::where('id_type',$id)->where('new',0)->paginate(3);
    	return view('product_type',compact('type','new_product','product'));
    }

    public function cart(){//render view cart
        if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
        }else{
            $cart = null;
        }
        return view('cart')->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);

    }

    public function add_to_cart(Request $req, $id){ //add one product in cart
    	$product = Products_Model::find($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $id);
    	$req->Session('cart')->put('cart',$cart);
    	return redirect()->back();
    }

    public function add_to_cart_multi(Request $req, $id, $quantity){ //add one product in cart
        $product = Products_Model::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add_multi($product, $id, $quantity);
        $req->Session('cart')->put('cart',$cart);
    }

    public function delete_by_one($id){ //remove one product of item
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function delete_item($id){ //remove one item with quality > 1
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function code_promo(){
        $code = Code_Promo_Model::where('code',$_POST['coupon'])->get()->first();
        if(!empty($code)){
            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $value = $code->value;
            $noti = "Code bon, vous obtenez ".$value."€ de réduction";
            $data['noti'] = $noti;
            $data['value'] = $value;
        }else{
            $noti = "Code n'est pas correct!";
            $data['noti'] = $noti;
            $data['value'] = 0;
        }
        return $data;
    } 
}
