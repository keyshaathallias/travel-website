@extends('layouts.layout')

@section('content')
  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
      });
    </script>
  @endif

  <div class="container px-6 pt-4 pb-6">
    <div class="heading">
      <p class="text-sm font-semibold text-secondary">EXPLORE</p>
      <h1 class="py-2 text-xl font-semibold text-dark">🌎 • Let's discover somewhere awesome!</h1>
    </div>

    <div class="flex flex-wrap justify-center mb-20 lg:mb-2">
      @if ($destinations->isEmpty())
        <div class="text-center justify-center items-center flex flex-col">
          <img src="/img/destination-animate.svg" alt="No Destination Yet" width="300">
          <p>No Destinations Available Yet</p>
        </div>
      @else
      <div class="grid grid-cols sm:grid-cols-2 lg:grid-cols-3 gap-1 lg:gap-6 p-0">
        @foreach ($destinations as $destination)
          <div class="justify-between gap-4">
            <div class="mt-4 bg-white shadow-md rounded-xl">
              <img src="{{ asset('storage/img/' . $destination->image) }}" alt="{{ $destination->name }}"
                class="h-[253px] rounded-xl">
              <div class="flex items-center justify-between">
                <div class="pt-2 pl-3 text-dark">
                  <p class="text-base font-semibold">{{ $destination->name }}</p>
                  <p class="pb-3 text-sm">{{ 'Rp ' . number_format($destination->ticket_price, 2, ',', '.') }}</p>
                </div>
                <form action="#" method="post" class="">
                  <button type="submit" href="#"
                    class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
                    <i class="text-2xl bi bi-cart4"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      @endif

      {{-- <div class="mt-4 bg-white shadow-md card rounded-xl">
        <img src="/img/bali.jpg" alt="Bali" class="h-[253px] rounded-xl">
        <div class="flex items-center justify-between">
          <div class="pt-2 pl-3 text-dark">
            <p class="text-base font-semibold">Bali, Indonesia</p>
            <p class="pb-3 text-sm">Rp 2.000.000,00</p>
          </div>

          <form action="#" method="post" class="">
            <button type="submit" href="#"
              class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
              <i class="text-2xl bi bi-cart4"></i>
            </button>
          </form>
        </div>
      </div>

      <div class="mt-4 bg-white shadow-md lg:ml-4 card rounded-xl">
        <img src="/img/paris.jpg" alt="Paris" class="h-[253px] rounded-xl">
        <div class="flex items-center justify-between">
          <div class="pt-2 pl-3 text-dark">
            <p class="text-base font-semibold">Paris</p>
            <p class="pb-3 text-sm">Rp 5.000.000,00</p>
          </div>

          <form action="#" method="post" class="">
            <button type="submit" href="#"
              class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
              <i class="text-2xl bi bi-cart4"></i>
            </button>
          </form>
        </div>
      </div>

      <div class="mt-4 bg-white shadow-md lg:ml-4 card rounded-xl">
        <img src="/img/jepang.jpg" alt="Tokyo" class="h-[253px] rounded-xl">
        <div class="flex items-center justify-between ">
          <div class="pt-2 pl-3 text-dark">
            <p class="text-base font-semibold">Tokyo, Jepang</p>
            <p class="pb-3 text-sm">Rp 4.000.000,00</p>
          </div>

          <form action="#" method="post" class="">
            <button type="submit" href="#"
              class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
              <i class="text-2xl bi bi-cart4"></i>
            </button>
          </form>
        </div>
      </div>

      <div class="mt-4 bg-white shadow-md card rounded-xl">
        <img src="/img/newyork.jpg" alt="Times Square" class="h-[253px] rounded-xl">
        <div class="flex items-center justify-between ">
          <div class="pt-2 pl-3 text-dark">
            <p class="text-base font-semibold">Times Square, New York</p>
            <p class="pb-3 text-sm">Rp 2.000.000,00</p>
          </div>

          <form action="#" method="post" class="">
            <button type="submit" href="#"
              class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
              <i class="text-2xl bi bi-cart4"></i>
            </button>
          </form>
        </div>
      </div>

      <div class="mt-4 bg-white shadow-md lg:ml-4 card rounded-xl">
        <img src="/img/rajaampat.jpg" alt="Raja Ampat" class="h-[253px] rounded-xl">
        <div class="flex items-center justify-between ">
          <div class="pt-2 pl-3 text-dark">
            <p class="text-base font-semibold">Raja Ampat, Indonesia</p>
            <p class="pb-3 text-sm">Rp 5.000.000,00</p>
          </div>

          <form action="#" method="post" class="">
            <button type="submit" href="#"
              class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
              <i class="text-2xl bi bi-cart4"></i>
            </button>
          </form>
        </div>
      </div>

      <div class="mt-4 bg-white shadow-md lg:ml-4 card rounded-xl">
        <img src="/img/singapura.jpg" alt="Singapura" class="h-[253px] rounded-xl">
        <div class="flex items-center justify-between ">
          <div class="pt-2 pl-3 text-dark">
            <p class="text-base font-semibold">Singapura</p>
            <p class="pb-3 text-sm">Rp 1.500.000,00</p>
          </div>

          <form action="#" method="post" class="">
            <button type="submit" href="#"
              class="flex items-center px-3 py-2 my-3 mr-3 text-white transition duration-200 ease-in-out bg-secondary hover:bg-lightgreen hover:text-primary rounded-xl">
              <i class="text-2xl bi bi-cart4"></i>
            </button>
          </form>
        </div>
      </div> --}}

    </div>
  </div>
@endsection
