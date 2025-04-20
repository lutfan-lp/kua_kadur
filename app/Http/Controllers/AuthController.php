<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function verify(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if ($validator->attempt(['email'=>$request->email, 'password'=>$request->password])) {
        //     // return redirect()->back()->withErrors($validator)->withInput(); 
        //     return redirect()->intended('/admin');
        // }else{
        //     return redirect(route('auth.index'))->with('pesan', 'Kombinasi email dan password salah!!!');
        // }
        if(Auth::guard('user')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->intended('/admin');
        }else{
            return redirect(route('auth.index'))->with('pesan', 'Kombinasi email dan password salah!!!');
        }
    }

    public function logout(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return redirect(route('auth.index'));
    }
}
