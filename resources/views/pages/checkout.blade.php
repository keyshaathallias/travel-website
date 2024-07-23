@extends('layouts.layout')

@section('content')
  <div class="container justify-between min-h-screen px-6 pt-4">
    <div class="heading">
      <p class="text-sm font-semibold text-secondary">PAYMENT</p>
      <h1 class="pt-2 text-xl font-semibold text-dark">💳 • Make a Payment</h1>
      <p class="text-xs text-primary">Please transfer to the account number below.</p>
    </div>

    <div class="flex flex-wrap items-center justify-center mt-2 lg:my-6">
      <form action="{{ route('submit.payment', $payment->id) }}" method="post" enctype="multipart/form-data"
        class="w-[342px] lg:w-[700px] p-6 lg:ml-6 bg-white shadow-md rounded-xl">
        @csrf
        @method('PUT')
        <h2 class="text-lg font-semibold text-dark">Payment Details</h2>
        <div class="pt-4">
          <label for="account_number" class="text-sm font-medium text-primary">Account Number</label>
          <input type="text" name="account_number" id="account_number" value="4321 8765 0987 6543"
            class="py-3 my-3 rounded-xl pe-5 ps-5 text-xs border-2 border-lightgreen w-full h-[38px] text-dark" readonly>
        </div>

        <div class="pt-2">
          <label for="payment_proof" class="text-sm font-medium text-primary">Proof of Payment</label>
          <input type="file" name="payment_proof" id="payment_proof"
            class="form-control py-1.5 pl-2 mt-3 mb-1 rounded-xl pe-5 ps-5 text-xs border-2 border-lightgreen w-full h-[38px] text-dark">
          @error('payment_proof')
            <div class="text-sm text-red-500">{{ $message }}</div>
          @enderror
        </div>

        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
        <input type="hidden" name="cart_id" value="{{ $cart->id }}">
        <input type="hidden" name="destination_id" value="{{ $destination->id }}">

        <div class="flex items-center pt-2">
          <button type="submit"
            class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-md">Submit</button>
        </div>
      </form>
    </div>
  </div>
@endsection
