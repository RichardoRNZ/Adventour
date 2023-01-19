<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\User;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\Tourdetail;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Transactionheader;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function cartadd(Request $request) {
        $rules = [
            'quantity' => 'min:1'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        // $cart = new Cart();
        // $cart->user_id = $request->user_id;
        // $cart->tour_id = $request->tour_id;
        // $cart->quantity = $request->quantity;
        // $cart->save();
        $id = $request->tour_id;
        $cart = session("cart");
        $item = Tour::where('id',$id)->first();
        $cart[$id] =[
            "image" => $item->image,
            "name" => $item->name,
            "quantity" => $request->quantity,
            "subtotal" => $item->price*$request->quantity

        ];
        session(["cart" =>$cart]);

        return redirect('cart');
    }
    public function viewCart() {
        $cart = session("cart");
        return view('cart')->with("cart",$cart);
    }

    public function destroyitem(Request $request)
    {
        $cart = session("cart");
        unset($cart[$request->id]);
        session(["cart" => $cart]);

        return redirect('cart');
    }

    public function transaction(Request $request) {
        $cartitems = session("cart");

        $th = new Transactionheader();
        $th->user_id = $request->user_id;
        $th->transaction_timestamp = $request->currenttime;
        $th->save();

        foreach($cartitems as $c =>$item) {
            $transaction = new Transaction();
            $transaction->transactionheader_id = $th->id;
            $transaction->tour_id = $c;
            $transaction->quantity = $item['quantity'];
            $transaction->price = $item['subtotal'];
            $transaction->save();
        }

        session()->forget("cart");

        return redirect('/');
    }
}
