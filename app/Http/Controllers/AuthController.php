<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function getRegister(){
        return view('/register');
    }
    
    public function postRegister(Request $Request){

        $this->validate($Request, [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed|alpha_num',
            'password_confirmation' => 'same:password',
            'phone' => 'required',
        ]);

        $user = User::create([
            'name' => $Request->name,
            'email' => $Request->email,
            'password' => bcrypt($Request->password),
            'phone' => $Request->phone
        ]);

        Auth::loginUsingId($user->id);

        return redirect()->route('home');

    }

    public function getLogin(){
        return view('/login');
    }

    public function postLogin(Request $Request){
        $remember_token = $Request->remember ? true : false;
        if(!Auth::attempt(['email' => $Request->email, 'password' => $Request->password, 'role' => $Request->role], $remember_token)){
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
        if ($remember_token) {
            $cookie = Auth::getRecallerName();
            Cookie::queue($cookie, Cookie::get($cookie), 720);
        }
        return redirect()->route('home');
    }

    public function getLogout(){
        auth()->logout();
        return redirect()->route('home');
    }

    public function getUpdate(){
        $user = Auth::user();
        return view('/profile', ['user' => $user]);
    }

    public function postUpdate(Request $request){

        $this->validate($request, [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'phone' => 'required',
        ]);

        $user = Auth::user();
        $new_user = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        );


        $user->fill($new_user)->save();
        return redirect()->back()->with(['success' => 'Profile has been updated.', 'id' => $user->id]);

    }
}
