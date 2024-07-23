<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users  = User::all();
        $user   = User::limit(3)->get();

        $destinations   = Destination::all();
        $destination    = Destination::limit(3)->get();

        $payments   = Payment::all();
        $payment    = Payment::limit(3)->get();

        $totalUser          = User::count();
        $totalDestination   = Destination::count();
        $totalPayment       = Payment::count();

        return view('admin.pages.dashboard', compact('user', 'users', 'destination', 'destinations', 'payments', 'payment', 'totalPayment', 'totalUser', 'totalDestination'));
    }
}
