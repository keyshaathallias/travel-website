@extends('layouts.layout')

@section('content')
  <div class="container flex flex-col justify-between min-h-screen px-6 pt-4 ">
    <div>
      <div class="heading">
        <p class="text-sm font-semibold text-secondary">CART</p>
      </div>

      <div class="flex flex-wrap flex-col justify-center mb-28 lg:mb-2">
        <h1 class="py-2 text-xl font-semibold text-dark">🕓 • Waiting for Payment</h1>

        @if ($waiting == null || $waiting->count() == 0)
          <div class="flex flex-col items-center justify-center text-center">
            <img src="/img/no-data-animate.svg" alt="No Payment History Yet" width="250">
            <p class="text-sm text-gray-500">No Waiting for Payment Available Yet</p>
          </div>
        @else
          <div class="grid gap-1 p-0 grid-cols sm:grid-cols-2 lg:grid-cols-3 lg:gap-x-6 lg:gap-y-1">
            @foreach ($waiting as $item)
              <div class="justify-between gap-4">
                <div class="mt-4 bg-white shadow-md rounded-xl">
                  <div class="flex items-center justify-between">
                    <div class="pt-2 pl-3 text-dark">
                      <p class="text-base font-semibold">{{ $item->cart->destinations->name }}</p>
                      <p class="pb-3 text-sm">
                        {{ 'Rp ' . number_format($item->cart->total(), 2, ',', '.') }}</p>
                    </div>
                    @if ($item->status == 'waiting for confirmation')
                      <a href="{{ route('cart.confirmation', $item->id) }}"
                        class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
                        <i class="bi bi-eye-fill"></i>
                        <span class="ml-2 text-sm">View</span>
                      </a>
                    @else
                      <a href="{{ route('cart.index', $item->cart->destinations->id) }}"
                        class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
                        <i class="bi bi-credit-card-2-back-fill"></i>
                        <span class="ml-2 text-sm">Pay</span>
                      </a>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif

        <h1 class="mt-4 py-2 text-xl font-semibold text-dark">💳 • Payment History</h1>
        @if ($success == null || $success->count() == 0)
          <div class="flex flex-col items-center justify-center text-center">
            <img src="/img/no-data-animate.svg" alt="No Payment History Yet" width="250">
            <p class="text-sm text-gray-500">No Payment History Available Yet</p>
          </div>
        @else
          <div class="grid gap-1 p-0 grid-cols sm:grid-cols-2 lg:grid-cols-3 lg:gap-x-6 lg:gap-y-1">
            @foreach ($success as $item)
              <div class="justify-between gap-4">
                <div class="mt-4 bg-white shadow-md rounded-xl">
                  <div class="flex items-center justify-between">
                    <div class="pt-2 pl-3 text-dark">
                      <p class="text-base font-semibold">{{ $item->cart->destinations->name }}</p>
                      <p class="pb-3 text-sm">
                        {{ 'Rp ' . number_format($item->cart->destinations->ticket_price, 2, ',', '.') }}</p>
                    </div>
                    <div class="flex">
                      <a href="{{ route('cart.confirmation', $item->id) }}"
                        class="flex items-center px-3 py-2 my-3 mr-2 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
                        <i class="bi bi-ticket-perforated"></i>
                        <span class="ml-2 text-sm">Ticket Trip</span>
                      </a>

                      <form action="{{ route('history.delete', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                          class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out transform bg-amber-500 rounded-xl hover:bg-amber-600">
                          <i class="text-sm lg:text-2xl bi bi-check-circle-fill"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
