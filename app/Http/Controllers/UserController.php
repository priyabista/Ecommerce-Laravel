<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // 
    public function index(){
      return view('frontend.dashboard') ;
    }

    public function register(){
      return view('frontend.register');

    }

    public function login(){
      return view('frontend.login');
    }
    public function authentication(Request $request){
      // echo "<pre>";
      // print_r($request -> toArray());

      $credentials = [
        'name' => $request->fullname,
        'email' => $request->email,
        'password' => $request->password,
      ];

  
    if(Auth::attempt($credentials)){
        $user = Auth::user();
        $request->session()->put(['user'=>$user]);
        if(session('user')['role']=== 0){
          return redirect('/admin');
        }else if(session('user')['role']=== 1){
          return redirect('/');
        }
        
        
    }else{
        return "Error";

    }
    }


    public function signup(Request $request ){
    //    echo "<pre>";
    //    print_r($request -> toArray());
    $request -> validate([
        'fullname' => 'required|string', 
        'email'    => 'required|email|unique:users', 
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
    ]);

    $user = new User();
     $user -> name = $request['fullname'];
     $user -> email = $request['email'];
     $user -> password = Hash::make($request['password']);
     $user -> save();
     return redirect('/');
    }


   public function logout(){
      session()->forget('user');
      return redirect()->back();
   }
  }
