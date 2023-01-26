<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\DetailTransaction;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\Tour;
use App\Models\Tourdetail;
use App\Models\Transaction;
use App\Models\Transactionheader;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        // home page admin
        return view('admin-page.dashboard');
    }
    public function manageHotel()
    {
        $hotels = Hotel::all();
        return view('admin-page.manage-hotels', compact('hotels'));
    }
    public function manageTour()
    {
        $packs = Tour::all();
        return view('admin-page.manage-tour',compact('packs'));
    }
    public function manageDestination(Request $request)
    {
        $tour_id= $request->id;
        $tour = Tour::select('name')->where('id', $request->id)->get();
        $destination = Tourdetail::where('tour_id',$request->id)->get();
        return view('admin-page.manage-destination', compact('destination','tour','tour_id'));
    }
    public function manageRestaurant()
    {
        $restaurants = Restaurant::all();
        return view('admin-page.manage-restaurants',compact('restaurants'));
    }

    public function viewAllCustomer()
    {
        $customers = User::where('role', 'customer')->get();
        return view('admin-page.view-customer',compact('customers'));
    }
    public function viewAllTransaction()
    {
        $transactions = Transactionheader::join('transactions', 'transaction_id', '=', 'transactions.id')
        ->join('detail_transactions', 'header_id', '=', 'transactionheaders.id')
        ->get();
        return view('admin-page.view-transaction', compact('transactions'));
    }
    public function addNewHotel(Request $request)
    {
        $hotel = new Hotel();
        $hotel->name = $request->hotel_name;
        $hotel->country_id = $request->country_id;
        $hotel->city = $request->hotel_city;
        $hotel->description = $request->hotel_description;
        $hotel->image = $this->newImage($request);
        $hotel->save();
        return redirect()->back()->with('success','Add Hotel Success');
    }
    public function addNewRestaurant(Request $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->restaurant_name;
        $restaurant->country_id = $request->country_id;
        $restaurant->city = $request->restaurant_city;
        $restaurant->description = $request->restaurant_description;
        $restaurant->image = $this->newImage($request);
        $restaurant->save();
        return redirect()->back()->with('success','Add Restaurant Success');

    }
    public function addNewTourPacket(Request $request)
    {
        $tour = new Tour();
        $tour->name = $request->tour_name;
        $tour->country_id = $request->country_id;
        $tour->hotel_id = $request->hotel_id;
        $tour->restaurant_id = $request->restaurant_id;
        $tour->description = $request->tour_description;
        $tour->price = $request->tour_price;
        $tour->image = $this->newImage($request);
        $tour->save();

        return redirect()->back()->with('success','Add Tour Pack Success');

    }
    public function addNewTourDetail(Request $request)
    {
        $tours = new Tourdetail();
        $tours->name = $request->name;
        $tours->tour_id = $request->tour_id;
        $tours->description = $request->description;
        $tours->image = $this->newImage($request);
        $tours->save();
        return redirect()->back()->with('success','Add Destination Success');
    }
    public function EditTour(Request $request)
    {
        $tour = Tour::find($request->id);
        $tour->name = $request->tour_name;
        $tour->country_id = $request->country_id;
        $tour->hotel_id = $request->hotel_id;
        $tour->restaurant_id = $request->restaurant_id;
        $tour->description = $request->tour_description;
        $tour->price = $request->tour_price;
        $tour->image = $this->newImage($request);
        $tour->update();
        return redirect()->back()->with('success','Edit Success');
    }
    public function EditTourDetail(Request $request)
    {
        $tours = Tourdetail::find($request->id);
        $tours->name = $request->name;
        // echo $request->name;
        $tours->tour_id = $request->tour_id;
        $tours->description = $request->description;
        $tours->image = $this->newImage($request);
        $tours->update();

        return redirect()->back()->with('success','Edit Success');

    }
    public function EditHotel(Request $request)
    {
        $hotel = Hotel::find($request->id);
        $hotel->name = $request->hotel_name;
        $hotel->country_id = $request->country_id;
        $hotel->city = $request->hotel_city;
        $hotel->description = $request->hotel_description;
        $hotel->image = $this->newImage($request);
        $hotel->update();
        return redirect()->back()->with('success','Edit Success');

    }
    public function EditRestaurant(Request $request)
    {
        $restaurant = Restaurant::find($request->id);
        $restaurant->name = $request->restaurant_name;
        $restaurant->country_id = $request->country_id;
        $restaurant->city = $request->restaurant_city;
        $restaurant->description = $request->restaurant_description;
        $restaurant->image = $this->newImage($request);
        $restaurant->update();
        return redirect()->back()->with('success','Edit Success');
    }
    public function deleteTour(Request $request)
    {
        Tour::where('id', $request->id)->delete();
        return redirect()->back()->with('success','Delete Success');
    }
    public function deleteTourDetail(Request $request)
    {
        Tourdetail::where('id', $request->id)->delete();
        return redirect()->back()->with('success','Delete Success');
    }
    public function deleteHotel(Request $request)
    {
        Hotel::where('id', $request->id)->delete();
        return redirect()->back()->with('success','Delete Success');
    }
    public function deleteRestaurant(Request $request)
    {
        Restaurant::where('id', $request->id)->delete();
        return redirect()->back()->with('success','Delete Success');
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
    public static function countUser()
    {
        $count = User::where('role', 'customer')->count();
        return $count;
    }
    public static function countPack()
    {
        $count = Tour::all()->count();
        return $count;
    }
    public static function countHotel()
    {
        $count = Hotel::all()->count();
        return $count;
    }
    public static function countRestaurant()
    {
        $count = Restaurant::all()->count();
        return $count;
    }
    public static function countTransaction()
    {
        $count = Transaction::all()->count();
        return $count;
    }
    public static function countCountry()
    {
        $count = Country::all()->count();
        return $count;
    }
}
