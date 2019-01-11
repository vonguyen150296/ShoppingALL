<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Type_Products_Model;
use App\Slide_Model;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.header',function($view){
            $type = Type_Products_Model::all();
            $view->with('type',$type);
        });

        view()->composer(['layouts.header','myaccount.layouts.purchases'], function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
            
            $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });

        view()->composer('myaccount.layouts.menu', function($view){
            if(Auth::check()){
                $view->with(['name'=>Auth::user()->name, 'subname'=>Auth::user()->subname, 'created_at'=>$created_at = Auth::user()->created_at, 'user_id'=>Auth::user()->user_id]);
            }
        });

        view()->composer(['layouts.slide','admin.list_diapo'], function($view){
            $slide = Slide_Model::all();
            $view->with('slide',$slide);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
