<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class registerController extends Controller
{
    public function create(){
        return view('auth.registration');
    }
    public function store(Request $request){

        $request->validate([
            // [
            // 'phone.numeric' => 'Phone number must be number',
            // 'confirm_password.same:password' => 'confirm password and password no match.',
           // ]

            'name'              => 'required|max:255',
            'phone'             => 'required|numeric',
            // regex:/^([0-9\s\-\+\(\)]*)$/|min:10
            'email'             => 'required|email|max:255',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password',
        ]);

        $formData               = $request->only('name','phone','email');
        $password               = $request->get('password');
        // $con_password        = $request->get('confirm_password');

        $formData['password']    = Hash::make ($password);

        // $formData['con_password'] = Hash::make ($password);

        // return $formData;

            if (Admin::create($formData) ) {
                Session::flash('message','Account Create Successfully!');
            }
            return redirect()->to('dashboard');
        }





}
