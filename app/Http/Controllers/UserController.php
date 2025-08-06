<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // public function signup(){
    //     return view('registration');
    // }

    // public function login(){
    //     return view('login');
    // }

    // public function registercheck(Request $request){
    //     $validation = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     $user = User::Create($validation);
    //     Auth::login($user);

    //     return redirect()->route('login');
    // }

    // public function logincheck(Request $request){
    //     $credential = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if(Auth::attempt($credential)){
    //         return redirect()->route('dashboard');
    //     }
    // }

    // public function goDashboard(){
    //     if(Auth::check() && Auth::user()->usertype == 'admin'){
    //         return view('admin.dashboard');
    //     }
    //     elseif(Auth::check() && Auth::user()->usertype == 'user'){
    //         return view('dashboard');
    //     }
    //     else{
    //         return redirect()->route('login');
    //     }
    // }

    // public function logout(){
    //     Auth::logout();
    //     return redirect()->route('login');
    // }
}
