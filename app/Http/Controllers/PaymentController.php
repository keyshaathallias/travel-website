<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Barryvdh\DomPDF\PDF;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $user    = Auth::user();
        $payment = Payment::where('status', '!=', 'pending')->get();

        $isPayment = null;

        if($payment == null){
            $isPayment = true;
        }else{
            $isPayment = false;
        }

        return view('admin.pages.payment', compact('payment', 'isPayment'));
    }

    public function show(string $id): View
    {
        $payment = Payment::findOrFail($id);
        return view('admin.pages.confirmPayment', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'status' => 'required'
        ]);

        $payment = Payment::findOrFail($id);

        $payment->update($credentials);

        return redirect()->route('payment.index')->with('success', 'Payment Confirmed.');
    }
}
