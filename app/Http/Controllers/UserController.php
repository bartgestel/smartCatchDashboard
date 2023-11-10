<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginName' => ['required'],
            'loginPass' => ['required']
        ]);

        if(auth()->attempt(['name' => $incomingFields['loginName'], 'password' => $incomingFields['loginPass']])){
            $request->session()->regenerate();
            return redirect('/home');
        }else{
            return redirect('/');
        }
    }

    public function register(Request $request){
        $incomingfields = $request->validate([
            'registerName' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'registerEmail' => ['required', 'email', Rule::unique('users', 'email')],
            'registerPass' => ['required', 'min:4']
        ]);

        $incomingfields['registerPass'] = bcrypt($incomingfields['registerPass']);
        $user = User::create([
            'name' => $incomingfields['registerName'],
            'email' => $incomingfields['registerEmail'],
            'password' => $incomingfields['registerPass']
        ]);
        auth()->login($user);
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
