<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function GoogleRedirect()
    {
        try {
            //code...
            $user = Socialite::driver('google')->user();
            $find = User::where('social_id', $user->getId())->first();

            if($find)
            {
                Auth::login($find);
                return redirect()->route('home');

            }
            else
            {
                // dd($user->id);
                $newUser = User::create([
                    'name' => $user->name,
                    // 'username' => $user->email,
                    'email'=>$user->email,
                    'social_id'=>$user->id,
                    'password' => bcrypt('12345679'),
                    'avatar' => $user->avatar

                ]);
                Auth::login($newUser);
                return redirect()->route('home');
            }

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
    public function login(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if($request->remember) {
            Cookie::queue('mycookie', $request->email, 120);
        }

        if(Auth::attempt($credentials, true)){
            Session::put('mysession','');
            if(Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            } return redirect()->route('home');
        }
        return redirect()->back();
    }



    public function registeruser(Request $request) {
        $rules = [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|alpha_num',
        ];

       $request->validate($rules);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

       return $this->login($request);
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('login_page');
    }


}


