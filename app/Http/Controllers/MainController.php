<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;

use App\User;
use Validator;
use Auth;
use Hash;



class MainController extends Controller
{
    use ValidatesRequests;
    function index(){
        return view('login');
    }

    function checklogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3',
        ]);
        $user_data = array(
        'email' => $request->get('email'),
        'password' => $request->get('password')
        );
        if(Auth::attempt($user_data))
        {
            return redirect('/');
        }
        else
        {
            return back()->with('error', 'wrong login details');
        }
    }
    function register(Request $request){
        $this->validate($request,[
            'name' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'min:5|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:5'
        ]);
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'remember_token' => Str::random(10),
        ]); 
        return redirect('login');
    }
    function logout()
    {
         Auth::logout();
         return redirect('login');
    }
}