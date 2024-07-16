<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Destination;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(String $id){
        $cart = Cart::with('destinations')->where('user_id', $id)->first();

        return view('pages.cart', compact('cart'));
    }

    public function cart(String $id){
        return view('pages.cart');
    }

    public function destroy($id): RedirectResponse
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('explore.index')->with('success', 'Cart has been deleted.');
    }
    
}
