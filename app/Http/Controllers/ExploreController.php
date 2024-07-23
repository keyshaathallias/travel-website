<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Destination;
use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function index(){
        $destinations = Destination::all();
        $active       = 'explore';

        return view('pages.explore', compact('destinations', 'active'));
    }

    public function show(string $id): View
    {
        $user = Auth::id();

        $payment = Payment::where('destination_id', $id)
        ->where('user_id', $user)
        ->first();

        $isPayment = null;

        if($payment == null){
            $isPayment = true;
        }else{
            $isPayment = false;
        }

        $destination = Destination::findOrFail($id);
        return view('pages.details', compact('payment', 'destination', 'isPayment'));
    }

    public function addCart(Request $request){
        $credentials = $request->validate([
            'user_id'        => 'required',
            'destination_id' => 'required',
        ]);

        Cart::create($credentials);

        $cart = Cart::latest()->first();


        Payment::create([
            'user_id'        => $credentials['user_id'],
            'destination_id' => $credentials['destination_id'],
            'cart_id'        => $cart->id,
        ]);
        return redirect('/cart/' . $credentials['destination_id'])->with('success', 'Added to cart');
    }
}
