<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(String $id){
        $cart = Cart::with('destinations')->where('user_id', $id)->first();

        return view('pages.cart', compact('cart'));
    }

    public function increaseQuantity($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->quantity ++;
        $cart->save();

        return redirect()->route('cart.index', Auth()->user()->id)->with('success', 'Quantity increased successfully!');
    }

    public function decreaseQuantity($id)
    {
        $cart = Cart::findOrFail($id);
        if ($cart->quantity > 1) {
            $cart->quantity --;
            $cart->save();
        } else {
            return redirect()->route('cart.index', Auth()->user()->id)->with('error', 'Quantity cannot be less than 1');
        }

        return redirect()->route('cart.index', Auth()->user()->id)->with('success', 'Quantity decreased successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('explore.index')->with('success', 'Cart has been deleted.');
    }
    
}
