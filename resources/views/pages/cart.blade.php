@extends('layouts.layout')

@section('content')
  <div class="container flex flex-col justify-between min-h-screen px-6 pt-4 ">
    <div>
      <div class="heading">
        <p class="text-sm font-semibold text-secondary">CART</p>
        <h1 class="py-2 text-xl font-semibold text-dark">🛒 • Book Your Trip</h1>
        @if ($cart !== null)
          <p class="text-xs text-primary">Make sure all the details are correct before proceeding to payment.</p>
        @endif
      </div>

      <div class="flex flex-wrap justify-center mb-28 lg:mb-2">

        @if ($cart == null)
          <div class="flex flex-col items-center justify-center mt-5 text-center">
            <img src="/img/destination-animate.svg" alt="No Destination Yet" width="300">
            <p class="text-sm text-gray-500">You haven't picked a destination.</p>
            <a href="{{ route('explore.index') }}"
              class="flex items-center justify-center px-5 py-3 mt-3 text-sm font-medium text-white transition duration-200 ease-in-out w-fit hover:shadow-lg rounded-xl bg-secondary hover:bg-lightgreen hover:text-primary">Explore</a>
          </div>
        @else
          <div class="justify-center mt-6 bg-white shadow-md lg:w-[458px] h-fit rounded-xl">
            <img src="{{ asset('storage/img/' . $cart->destinations->image) }}" alt="{{ $cart->destinations->name }}"
              class="w-full rounded-xl">
            <div class="flex items-center justify-between">
              <div class="pt-2 pl-3 text-dark">
                <p class="text-sm font-semibold lg:text-base">{{ $cart->destinations->name }}</p>
                <p class="pb-3 text-xs lg:text-sm">
                  {{ 'Rp ' . number_format($cart->destinations->ticket_price, 2, ',', '.') }}</p>
              </div>

              <div class="flex items-center gap-4">
                <form action="{{ route('cart.decrease', $cart->id) }}" method="post">
                  @csrf
                  @method('PATCH')
                  <button type="submit"
                    class="flex items-center px-2 py-1 my-3 transition duration-200 ease-in-out text-dark bg-lightgreen hover:bg-secondary hover:text-white rounded-xl">
                    <i class="text-xl lg:text-2xl bi bi-dash"></i></button>
                </form>

                <p class="text-sm lg:text-base">{{ $cart->quantity }}</p>

                <form action="{{ route('cart.increase', $cart->id) }}" method="post">
                  @csrf
                  @method('PATCH')
                  <button type="submit"
                    class="flex items-center px-2 py-1 my-3 transition duration-200 ease-in-out text-dark bg-lightgreen hover:bg-secondary hover:text-white rounded-xl">
                    <i class="text-xl lg:text-2xl bi bi-plus"></i></button>
                </form>
              </div>

              <form action="{{ route('cart.delete', $cart->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="flex items-center px-3 py-2 mr-3 text-white transition duration-200 ease-in-out transform bg-red-500 rounded-xl hover:bg-red-600">
                  <i class="text-sm lg:text-2xl bi bi-trash3-fill"></i>
                </button>
              </form>
            </div>
          </div>

          <div class="items-center justify-center mt-2 lg:my-6">
            <div class="lg:w-[700px] p-6 lg:ml-6 bg-white shadow-md rounded-xl">
              <h2 class="text-lg font-semibold text-dark">Price Details</h2>
              <div class="left-0 right-0 flex justify-between pt-4 text-sm text-primary">
                <p class="font-medium">Ticket Price</p>
                <p>{{ 'Rp ' . number_format($cart->destinations->ticket_price, 2, ',', '.') }}</p>
              </div>
              <hr class="my-2 border-gray-300">
              <div class="left-0 right-0 flex justify-between pt-2 text-sm text-primary">
                <p class="font-bold">Total Price</p>
                <p>{{ 'Rp ' . number_format($cart->total(), 2, ',', '.') }}</p>
              </div>
            </div>

            <div class="w-[342px] mt-4 lg:w-[700px] p-6 lg:ml-6 bg-white shadow-md rounded-xl">
              <h2 class="text-lg font-semibold text-dark">Contact Details</h2>
              <div class="pt-4">
                <label for="name" class="text-sm font-medium text-primary">Name</label>
                <input type="text" name="name" id="name" value="{{ Auth()->user()->name }}"
                  class="py-3 my-3 rounded-xl pe-5 ps-5 text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
                  readonly>
              </div>
              <div class="pt-2">
                <label for="email" class="text-sm font-medium text-primary">Email</label>
                <input type="email" name="email" id="email" value="{{ Auth()->user()->email }}"
                  class="py-3 my-3 rounded-xl pe-5 ps-5 text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
                  readonly>
              </div>
            </div>

            <form action="{{ route('cart.checkout', $cart->id) }}" method="POST"
              class="items-center justify-center mt-2 lg:my-6">
              @csrf
              @method('PUT')
              <div class="w-[342px] lg:w-[700px] p-6 lg:ml-6 bg-white shadow-md rounded-xl mt-4">
                <label for="departure_date" class="text-lg font-semibold text-dark">Departure Date</label>
                <input type="date" name="departure_date" id="departure_date"
                  class="py-3 my-3 rounded-xl pe-5 ps-5 text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
                  required>

                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                <input type="hidden" name="destination_id" value="{{ $cart->destinations->id }}">
                <button type="submit"
                  class="flex items-center justify-center w-full px-5 py-3 mt-3 text-sm font-medium text-white transition duration-200 ease-in-out hover:shadow-lg rounded-xl bg-secondary hover:bg-lightgreen hover:text-primary">
                  Make a Payment
                </button>
              </div>
            </form>
          </div>
        @endif

      </div>
    </div>
  </div>
@endsection
