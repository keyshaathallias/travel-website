@extends('layouts.layout')

@section('content')
  <div class="container px-6 pt-4 pb-6">
    <div class="heading">
      <p class="text-sm font-semibold text-secondary">EXPLORE</p>
      <h1 class="py-2 text-xl font-semibold text-dark">🌎 • Let's discover somewhere awesome!</h1>
    </div>

    <div class="flex flex-wrap items-center justify-center mb-20 lg:mb-2">
      @if ($destinations->isEmpty())
        <div class="flex flex-col items-center justify-center text-center">
          <img src="/img/destination-animate.svg" alt="No Destination Yet" width="300">
          <p class="text-sm text-gray-500">No Destinations Available Yet</p>
        </div>
      @else
        <div class="grid gap-1 p-0 grid-cols sm:grid-cols-2 lg:grid-cols-3 lg:gap-x-6 lg:gap-y-1">
          @foreach ($destinations as $destination)
            <div class="justify-between gap-4">
              <div class="mt-4 bg-white shadow-md rounded-xl">
                <img src="{{ asset('storage/img/' . $destination->image) }}" alt="{{ $destination->name }}"
                  class="h-[253px] rounded-xl w-full">
                <div class="flex items-center justify-between">
                  <div class="pt-2 pl-3 text-dark">
                    <p class="text-base font-semibold">{{ $destination->name }}</p>
                    <p class="pb-3 text-sm">{{ 'Rp ' . number_format($destination->ticket_price, 2, ',', '.') }}</p>
                  </div>
                  <a href="{{ route('explore.details', $destination->id) }}"
                    class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
                    <i class="bi bi-eye-fill"></i>
                    <span class="ml-2 text-sm">See Details</span>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
@endsection
