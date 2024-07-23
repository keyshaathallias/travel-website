@extends('layouts.layout')

@section('content')
  <div class="container justify-between min-h-screen px-6 pt-4">
    <div class="heading">
      <p class="text-sm font-semibold text-secondary">PAYMENT</p>
      <h1 class="pt-2 text-xl font-semibold text-dark">💳 • Ticket Trip</h1>
      <p class="text-xs text-primary">Download your E-Voucher here!</p>
    </div>

    <div class="flex flex-wrap items-center justify-center mt-2 lg:my-6">
      <div class="w-[342px] lg:w-[700px] p-6 lg:ml-6 bg-white shadow-md rounded-xl text-center">
        <h2 class="text-lg font-semibold text-dark">Order Details</h2>
        <div class="mt-3 text-sm text-primary">
          <p><span class="mr-2 font-semibold">Status: </span>{{ $payment->status }}</p>
        </div>
        <div class="flex items-center pt-2 text-center justify-center">
          @if ($payment->status == 'successful')
            <a href="{{ route('e.voucher') }}"
              class="flex items-center justify-center w-full px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">E-Voucher</a>
          @else
            <p class="text-red-500 text-sm">E-Voucher available after payment confirmation.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
