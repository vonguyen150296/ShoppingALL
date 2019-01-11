<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Customers_Model;
use App\Bills_Model;
use App\Bill_Detail_Model;
use App\Slide_Model;
use Illuminate\Support\Facades\Auth;

class Account_Controller extends Controller
{
    public function list_user(){
    	$users = User::where('admin',0)->get();
    	return view('admin.list_user',compact('users'));
    }

    public function user($user_id){
        $user = User::where('user_id', $user_id)->select('name','subname','address','phone','email','created_at')->get()->first();
        //var_dump($user);
        return view('admin.user', compact('user'));
    }

    public function delete_user($user_id){
        User::where('user_id',$user_id)->delete();
        return redirect()->route('list-user');
    }

    public function list_customer(){
        $customers = Customers_Model::all();
    	return view('admin.list_customer', compact('customers'));
    }

    public function customer($id){
        $customer = Customers_Model::where('id',$id)->get()->first();
        $infos = Bills_Model::where('id_customer',$id)->get();
        $detail = Bills_Model::where('id_customer',$id)->join('bill_detail', 'bills.id','=','bill_detail.id_bill')->join('products','products.id','=','bill_detail.id_product')->get();
        return view('admin.customer', compact('customer', 'infos','detail'));
    }

    public function delete_customer($id){
        Customers_Model::where('id',$id)->delete();
        return redirect()->route('list-customer');
    }

    public function list_diapo(){
    	return view('admin.list_diapo');
    }

    public function delete_diapo($id){
        Slide_Model::where('id',$id)->delete();
        return redirect()->route('list-diapo');
    }

    public function post_diapo(){
    	return view('admin.post_diapo');
    }

    public function upload_diapo(Request $req){
        $fichier = $req->file('image');
        $nom = $fichier->getClientOriginalName();
        
        if($req->hasFile('image')){
            $image = str_random(5)."_".$nom;
            while(file_exists("image/thumbs/".$image)){
                $image = str_random(5)."_".$nom;
            }
            
            $fichier->move("image/thumbs/",$image);
        }
        $slide = new Slide_Model();
        $slide->name = $req->name;
        $slide->image = $image;
        $slide->save();
        return redirect()->route('list-diapo');
    }

    public function login(){
        return view('admin.login');
    }

    public function post_login(Request $request){ //vérifier lé information de connexe sont correct ou non 

        if( Auth::attempt(['email'=>$request->username, 'password'=>$request->password, 'admin'=>1]) )
        {
            return redirect()->route('list-customer');
        }else{
            $error = "Votre adresse mail ou mot de passe n'est pas correct";
            return view('admin.login', compact('error'));
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin-login');
    }
}
