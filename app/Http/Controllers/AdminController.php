<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
 
    public function index(){
        return view('frontend.admin.dashboard');
    }

    public function logout(){
        session()->forget('user');
      return redirect()->back();
    }
}
