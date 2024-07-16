<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Destination;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function index(){
        $destinations = Destination::all();
        $active = 'explore';
        return view('pages.explore', compact('destinations', 'active'));
    }

    public function show(string $id): View
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        $isCart = null;

        if($cart == null){
            $isCart = true;
        }else{
            $isCart = false;
        }

        $destination = Destination::findOrFail($id);
        return view('pages.details', compact('destination', 'isCart'));
    }

    public function addCart(Request $request){
        $credentials = $request->validate([
            'user_id' => 'required',
            'destination_id' => 'required',
        ]);

        Cart::create($credentials);
        return redirect('/cart/'.$credentials['user_id'])->with('success', 'Added to cart');
    }
}
