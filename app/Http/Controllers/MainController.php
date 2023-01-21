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




    public function indextravel() {
        session()->forget("cart");
        $tours = Tour::paginate(12);
        return view('travelpack', compact('tours'));
    }

    public function redirectDetail($id) {
        $tour = Tour::where('id',$id)->get();
        return view('detail', compact('tour'));
    }

    public function list(Request $request){
        $country = Country::where('id', $request->id)->get();
        return view('country', compact('country'));
        // dd($request->id);
    }

    public function searchpack(Request $request) {
        $search = $request->search;
        $tours = Tour::where('name', 'LIKE', "%$search%")->paginate(12);
        return view('searchpack', compact('search','tours'));
    }

    public function viewHistory(){
        $items = Transactionheader::where('user_id', Auth::id())->get();
        return view('history', compact('items'));
    }
    public static function getAllCountry()
    {
        $countries = Country::with('tours')->has('tours')->get();
        return $countries;
    }

}
