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
                return redirect()->route('home')->with('success','Login Success');
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
                return redirect()->route('dashboard')->with('success','Login Success');
            } return redirect()->route('home')->with('success','Login Success');
        }
        return redirect()->back()->with('success','Login Failed');
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
    public function editProfileLogic(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $this->newImage($request)
            ]);
            return redirect()->route('home')->with('success', 'Edit Profile Success');
    }
    public function newImage(Request $request)
    {
        $fileObj = $request->file('image');
        $name = $fileObj->getClientOriginalName();
        $ext = $fileObj->getClientOriginalExtension();
        $new_file_name = $name . time() . '.' .$ext;
        $fileObj->storeAs('public/images', $new_file_name);
        return $new_file_name;
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            "old_password"=>"required|min:6",
            "new_password"=>"required|min:6",
            "confirm_password" => "required|same:new_password"
        ],[
            'old_password.required' => 'Password must be filled',
            'old_password.min'=>'Password must be filled with minimum 6 characters',
            'new_password.required' => 'Password must be filled',
            'new_password.min'=>'Password must be filled with minimum 6 characters',
            'confirm_password.required' => 'Please confirm your password',
            'confirm_password.same' => 'Password must be same'
        ]);
        if(!Hash::check($request->old_password, auth()->user()->password))
        {
            return redirect()->back()->with('success',"Password does not match");
        }
        if($request->old_password == $request->new_password)
        {
            return redirect()->back()->with('success',"Password same");
        }
        $user = User::find(auth()->user()->id);
        $user->password = bcrypt($request->new_password);
        $user->update();
        return redirect()->route('home')->with('success','Password Successfuly Changed');


    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login_page');
    }


}


