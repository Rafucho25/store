<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;

use App\User;

class UserController extends Controller
{

    public function register(Request $request){
        $data = $request->all();
        Sentinel::registerAndActivate($data);
        return redirect('/');
    }

    public function login(Request $request){
        $data = $request->all();
        if(isset($data['remember'])){
            if(Sentinel::authenticateAndRemember($data) == false){
                return redirect()->back()->with('message', 'Correo o Contraseña incorrecta, trate de nuevo');
            }
            return redirect('/');
        }

        if(Sentinel::authenticate($data, true) == false){
            return redirect()->back()->with('message', 'Correo o Contraseña incorrecta, trate de nuevo');
        }
        return redirect('/');
    }
    
    public function logout(){
        Sentinel::logout();
        return redirect('/');
    }
}
