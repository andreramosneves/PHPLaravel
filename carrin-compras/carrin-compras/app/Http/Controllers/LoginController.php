<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\RegisterController;
use App\User;

class LoginController extends Controller
{

    public function checkLogin(Request $request){
        /*
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        */

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
             $request->session()->put('user',$request->input('email'));
             return redirect()->intended('home');
        }else{
            $erro = "Usuário invalido!!";
        }
        return view('login',['erro'=>$erro]);

    }

    public function registraUsuario(Request $request){
        /*
         $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);
        */
        $validatedData['name'] = $request->input('user');
        $validatedData['email'] = $request->input('user');
        $validatedData['password'] = bcrypt($request->input('pwd'));

        $user = User::create($validatedData);

//        $accessToken = $user->createToken('authToken')->accessToken;
        
        return view('registrar',['user' => $user]);
    }

    public function logout(){
        session()->forget('user');
        Auth::logout();
        return redirect()->intended('home');
    }

}
