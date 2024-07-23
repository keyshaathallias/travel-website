<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Destination;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(String $destinationId){
        $cart = Cart::where('user_id', Auth::id())
        ->where('destination_id', $destinationId)
        ->first();
        
        return view('pages.cart', compact('cart'));
    }

    public function cartHistory(){
        $user    = Auth::id();

        $waiting = Payment::with(['cart', 'cart.destinations'])
        ->where('user_id', $user)
        ->where('status', '!=', 'successful')
        ->get();

        $success = Payment::with(['cart', 'cart.destinations'])
        ->where('user_id', $user)
        ->where('status', 'successful')
        ->get();

        return view('pages.cartHistory', compact('waiting', 'success'));
    }

    public function increaseQuantity($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->quantity ++;
        $cart->save();

        return redirect()->route('cart.index', $cart->destination_id)->with('success', 'Quantity increased successfully!');

    }

    public function decreaseQuantity($id)
    {
        $cart = Cart::findOrFail($id);
        if ($cart->quantity > 1) {
            $cart->quantity --;
            $cart->save();
        } else {
            return redirect()->route('cart.index', $cart->destination_id)->with('error', 'Quantity cannot be less than 1');
        }

        return redirect()->route('cart.index', $cart->destination_id)->with('success', 'Quantity decreased successfully!');
    }

    public function checkout(Request $request, $id)
    {
        $credentials = $request->validate([
            'departure_date' => 'required',
        ]);
        
        $cart = Cart::where('id', $id)
        ->where('destination_id', $request->destination_id)
        ->where('user_id', $request->user_id)
        ->first();

        $cart->departure_date = $request->departure_date;
        $cart->save();

        return redirect()->route('make.payment', $cart->destination_id);
    }

    public function confirmation($id){
        $user    = Auth::user();
        $payment = Payment::where('user_id', $user->id)
        // ->where('id', $id)
        ->latest()->first();
        // $payment = Payment::where('user_id', $user->id)->first();

        // return $payment;
        return view('pages.transaction', compact('user', 'payment'));
    }

    public function destroy($id): RedirectResponse
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('explore.index')->with('success', 'Cart has been deleted.');
    }
    
}
