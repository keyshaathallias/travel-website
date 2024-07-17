@extends('layouts.layout')

@section('content')
  <div class="container px-6 pt-4 pb-6">
    <div class="heading">
      <p class="text-sm font-semibold text-secondary">EXPLORE</p>
      <h1 class="py-2 text-xl font-semibold text-dark">🌎 • Let's discover somewhere awesome!</h1>
    </div>

    <div class="flex flex-wrap justify-center mb-20 lg:mb-2 ">
      <div class="w-[450px] lg:w-[500px] mt-4 bg-white shadow-md rounded-xl">
        <img src="{{ asset('storage/img/' . $destination->image) }}" alt="{{ $destination->name }}"
          class="w-full rounded-xl">
        <div class="flex items-center justify-between">
          <div class="pt-2 pl-3 text-dark w-fit">
            <p class="text-lg font-semibold">{{ $destination->name }}</p>
            <p class="pb-3 text-base">{{ 'Rp ' . number_format($destination->ticket_price, 2, ',', '.') }}</p>
            <p class="mb-1 text-base font-semibold">Description</p>
            <p class="pr-2 text-sm text-gray-600">{{ $destination->description }}</p>
            @if ($isCart)
              <form action="{{ route('add.cart') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                <button type="submit"
                  class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
                  <i class="text-2xl bi bi-cart4"></i>
                  <span class="ml-2 text-md">Book Now</span>
                </button>
              </form>
            @else
              <a href="{{ route('cart', Auth()->user()->id) }}"
                class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out w-fit bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
                <i class="text-2xl bi bi-cart4"></i>
                <span class="ml-2 text-md">Cart</span>
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
