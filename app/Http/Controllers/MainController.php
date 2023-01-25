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
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
class MainController extends Controller
{
    public function indexhome() {
        session()->forget("cart");
        return view('home');
    }




    public function loginPage() {
        session()->forget("cart");
        return view('login');
    }
    public function editProfile(Request $request)
    {

        return view('edit-profile');
    }

    public function changePassword()
    {
        return view('change-password');
    }

    public function indextravel() {
        session()->forget("cart");
        $tours = Tour::paginate(12);
        return view('travelpack', compact('tours'));
    }

    public function redirectDetail($id) {
        session()->forget("cart");
        $tour = Tour::where('id',$id)->get();
        return view('detail', compact('tour'));
    }

    public function list(Request $request){
        session()->forget("cart");
        $country = Country::where('id', $request->id)->get();
        return view('country', compact('country'));
        // dd($request->id);
    }

    public function searchpack(Request $request) {
        session()->forget("cart");
        $search = $request->search;
        $tours = Tour::where('name', 'LIKE', "%$search%")->paginate(12);
        return view('searchpack', compact('search','tours'));
    }

    public function viewHistory(){
        session()->forget("cart");
        $items = Transactionheader::where('user_id', Auth::id())
        ->join('detail_transactions', 'header_id', '=', 'transactionheaders.id')
        ->get();
        return view('history', compact('items'));
    }
    public function filterHistory(Request $request)
    {
        $items = Transactionheader::where('user_id', Auth::id())
        ->join('transactions', 'transaction_id', '=', 'transactions.id')
        ->join('detail_transactions', 'header_id', '=', 'transactionheaders.id')
        ->orderBy("$request->filter", "$request->sort")
        ->get();
        if(isset($_GET['reset']))
        {
            return redirect()->route('history');
        }
        return view('history', compact('items'));
    }
    public static function getAllCountry()
    {
        $countries = Country::with('tours')->has('tours')->get();
        return $countries;
    }
    public static function getCountries()
    {
        $countries = Country::all();
        return $countries;
    }
    public static function getHotel()
    {
        $hotels = Hotel::all();
        return $hotels;
    }
    public static function getRestaurant()
    {
        $restaurants = Restaurant::all();
        return $restaurants;
    }
    public static function getTourPack()
    {
        $tours = Tour::all();
        return $tours;
    }
    public static function getTourPackById($id)
    {
        $tour = Tour::where('id',$id)->get();
        return $tour;
    }
    public static function imageAdapter($imageURL)
    {

        if(Str::contains($imageURL,'https://')  ||  Str::contains($imageURL,'data:image'))
        {
            return $imageURL;
        }

        return 'storage/images/'.$imageURL;
    }

}
