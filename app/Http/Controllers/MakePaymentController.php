<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Destination;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MakePaymentController extends Controller
{
    public function index(String $id)
    {
        $user        = Auth::user();
        $destination = Destination::findOrFail($id);
        
        $payment     = Payment::where('user_id', $user->id)
        ->where('destination_id', $id)
        ->latest()
        ->first();

        $cart        = Cart::where('user_id', $user->id)
        ->where('destination_id', $id)
        ->first();

        return view('pages.checkout', compact('cart', 'destination', 'payment'));
    }

    public function submitPayment(Request $request, $id)
    {
        $payment = Payment::where('id', $id)
        ->where('user_id', $request->user_id)
        ->first();

        if ($request->hasFile('payment_proof')) {
            $paymentProof = $request->file('payment_proof')->store('payment_proof', 'public');
        } else {
            $paymentProof = null;
        }

        $payment->status = 'waiting for confirmation';
        $payment->payment_proof = $paymentProof;
        $payment->save();

        return redirect()->route('cart.confirmation', $payment->destination_id)->with('success', 'Payment successful. Download your E-Voucher.');

        // $credentials = $request->validate(['payment_proof'  => 'required|image']);
        // $paymentProof = $request->file('payment_proof');
        // $paymentPath  = $paymentProof->storeAs($paymentProof->hashName());
        // $payment->payment_proof = $paymentPath;
    }

    public function eVoucher(){
        $user    = Auth::user();
        $payment = Payment::with('destination', 'cart')
        ->where('user_id', $user->id)
        ->where('status', 'successful')
        ->latest()
        ->first();

        $pdf = Pdf::loadView('pages.eVoucher', ['payment' => $payment]);
        return $pdf->stream('e-voucher.pdf');

        return view('pages.eVoucher', compact('user', 'payment'));
    }

    public function destroyHistory($id): RedirectResponse
    {
        $payment = Payment::findOrFail($id);
        $cart    = Cart::findOrFail($id);

        if ($payment->payment_proof && Storage::disk('public')->exists($payment->payment_proof)) {
            Storage::disk('public')->delete($payment->payment_proof);
        }

        $payment->delete();
        $cart->delete();

        return redirect()->route('cart.history', Auth()->user()->id)->with('success', 'Hooray! Your trip is done.');
    }
}
