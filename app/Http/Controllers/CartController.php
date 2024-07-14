<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Destination;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::with('destinations')->get();

        return view('pages.cart', compact('cart'));
    }

    public function create(){
        
    }
    public function store(){

    }
}
