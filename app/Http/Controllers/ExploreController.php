<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index(){
        $destinations = Destination::all();
        return view('pages.explore', compact('destinations'));
    }
}
