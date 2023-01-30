<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

 public function index(){
    return view('auth.login');
 }

 public function authenticate(LoginRequest $request)
 {
     $data = $request->only('phone','password');

     if (Auth::attempt($data)) {
         return redirect()->intended('dashboard');
     } else {
         return redirect()->route('login')->withErrors(['Invalid Phone Number and password']);
     }
 }

 public function logout(){
    Auth::logout();
    return redirect()->to('/login');
 }

}
