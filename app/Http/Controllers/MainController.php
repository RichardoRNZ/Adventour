<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\User;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\Tourdetail;
use App\Models\Transaction;
use App\Models\Transactionheader;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function indexhome() {
        return view('home');
    }

    public function profile() {
        return view('profile');
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }

    public function loginPage() {
        return view('login');
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
                return redirect('/');
            } return redirect('/');
        }
        return redirect('/login');
    }

    public function registerPage() {
        return view('register');
    }

    public function registeruser(Request $request) {
        $rules = [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|alpha_num',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return view('register')->with($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function indextravel() {
        $tours = Tour::all();
        return view('travelpack', compact('tours'));
    }

    public function redirectDetail($id) {
        $tour = Tour::findOrFail($id);
        return view('detail', compact('tour'));
    }

    public function list($id){
        $country = Country::findOrFail($id);
        return view('country', compact('country'));
    }

    public function searchpack(Request $request) {
        $tours = Tour::where('name', 'LIKE', "%$request->search%")->get();
        return view('searchpack')->with('tours', $tours);
    }

    public function viewHistory(){
        $items = Transactionheader::where('user_id', Auth::id())->get();
        return view('history', compact('items'));
    }
}
