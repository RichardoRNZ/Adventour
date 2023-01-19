<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\Tour;
use App\Models\Tourdetail;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        // home page admin
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
    }
    public function addNewRestaurant(Request $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->hotel_name;
        $restaurant->country_id = $request->country_id;
        $restaurant->city = $request->hotel_city;
        $restaurant->description = $request->hotel_description;
        $restaurant->image = $this->newImage($request);
        $restaurant->save();

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

    }
    public function addNewTourDetail(Request $request)
    {
        $tours = new Tourdetail();
        $tours->name = $request->tour_detail_name;
        $tours->tour_id = $request->tour_id;
        $tours->description = $request->tour_detail_description;
        $tours->image = $this->newImage($request);
        $tours->save();
    }
    public function EditTour(Request $request)
    {
        $tour = Tour::where('id',$request->id)->get();
        $tour->name = $request->tour_name;
        $tour->country_id = $request->country_id;
        $tour->hotel_id = $request->hotel_id;
        $tour->restaurant_id = $request->restaurant_id;
        $tour->description = $request->tour_description;
        $tour->price = $request->tour_price;
        $tour->image = $this->newImage($request);
        $tour->update();
    }
    public function EditTourDetail(Request $request)
    {
        $tours = Tourdetail::where('id',$request->id);
        $tours->name = $request->tour_detail_name;
        $tours->tour_id = $request->tour_id;
        $tours->description = $request->tour_detail_description;
        $tours->image = $this->newImage($request);
        $tours->update();

    }
    public function EditHotel(Request $request)
    {
        $hotel = Hotel::where('id',$request->id);
        $hotel->name = $request->hotel_name;
        $hotel->country_id = $request->country_id;
        $hotel->city = $request->hotel_city;
        $hotel->description = $request->hotel_description;
        $hotel->image = $this->newImage($request);
        $hotel->update();
    }
    public function EditRestaurant(Request $request)
    {
        $restaurant = Restaurant::where('id', $request->id);
        $restaurant->name = $request->hotel_name;
        $restaurant->country_id = $request->country_id;
        $restaurant->city = $request->hotel_city;
        $restaurant->description = $request->hotel_description;
        $restaurant->image = $this->newImage($request);
        $restaurant->update();
    }
    public function deleteTour(Request $request)
    {
        Tour::where('id', $request->id)->delete();
        return redirect()->back();
    }
    public function deleteTourDetail(Request $request)
    {
        Tourdetail::where('id', $request->id)->delete();
        return redirect()->back();
    }
    public function deleteHotel(Request $request)
    {
        Hotel::where('id', $request->id)->delete();
        return redirect()->back();
    }
    public function deleteRestaurant(Request $request)
    {
        Tour::where('id', $request->id)->delete();
        return redirect()->back();
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
}
