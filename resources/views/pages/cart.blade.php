@extends('layouts.layout')

@section('content')
  <div class="container flex flex-col justify-between min-h-screen px-6 pt-4 ">
    <div>
      <div class="heading">
        <p class="text-sm font-semibold text-secondary">CART</p>
        <h1 class="py-2 text-xl font-semibold text-dark">🛒 • Book Your Trip</h1>
        <p class="text-xs text-primary">Make sure all the details are correct before proceeding to payment.</p>
      </div>

      <div class="flex flex-wrap justify-center mb-28 lg:mb-2">

        <div class="justify-center mt-4 bg-white shadow-md lg:w-[458px] h-fit rounded-xl">
          <img src="/img/bali.jpg" alt="Bali" class="w-full rounded-xl">
          <div class="flex items-center justify-between">
            <div class="pt-2 pl-3 text-dark">
              <p class="text-sm font-semibold lg:text-base">Bali, Indonesia</p>
              <p class="pb-3 text-xs lg:text-sm">Rp 2.000.000,00</p>
            </div>
            <form action="" method="" class="flex items-center gap-4">
              <button type="submit" href="#"
                class="flex items-center px-2 py-1 my-3 transition duration-200 ease-in-out text-dark bg-lightgreen hover:bg-secondary hover:text-white rounded-xl">
                <i class="text-xl lg:text-2xl bi bi-dash"></i>
              </button>
              <p class="text-sm lg:text-base">2</p>
              <button type="submit" href="#"
                class="flex items-center px-2 py-1 my-3 mr-3 transition duration-200 ease-in-out text-dark bg-lightgreen hover:bg-secondary hover:text-white rounded-xl">
                <i class="text-xl lg:text-2xl bi bi-plus"></i>
              </button>
            </form>
            <button type="submit" href="#"
              class="flex items-center px-3 py-2 mr-3 text-white transition duration-200 ease-in-out transform bg-red-500 rounded-xl hover:bg-red-600">
              <i class="text-sm lg:text-2xl bi bi-trash3-fill"></i>
            </button>
          </div>
        </div>

        <div class="items-center justify-center mt-4 lg:my-6">
          <form action="" method="post" class="w-[342px] lg:w-[700px] p-6 lg:ml-6 bg-white shadow-md rounded-xl">
            <h2 class="text-lg font-semibold text-dark">Contact Details</h2>
            <div class="pt-4">
              <label for="fullname" class="text-sm font-medium text-primary">Full Name</label>
              <input type="text" name="fullname" id="fullname"
                class="py-3 my-3 rounded-xl pe-5 ps-5 text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
                placeholder="Input your full name...">
            </div>
            <div class="pt-2">
              <label for="email" class="text-sm font-medium text-primary">Email</label>
              <input type="email" name="email" id="email"
                class="py-3 my-3 rounded-xl pe-5 ps-5 text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
                placeholder="Input your email...">
            </div>
          </form>
          <div class="w-[342px] lg:w-[700px] p-6 lg:ml-6 bg-white shadow-md rounded-xl mt-4">
            <h2 class="text-lg font-semibold text-dark">Departure Date</h2>
            <input type="date" name="date" id="date"
              class="py-3 my-3 rounded-xl pe-5 ps-5 text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
              placeholder="Choose the date">
          </div>
          <div class="lg:w-[700px] p-6 mt-4 lg:ml-6 bg-white shadow-md rounded-xl">
            <h2 class="text-lg font-semibold text-dark">Price Details</h2>

            <div class="left-0 right-0 flex justify-between pt-4 text-sm text-primary">
              <p class="font-medium">Ticket Price</p>
              <p>Rp 2.000.000,00</p>
            </div>

            <hr class="my-2 border-gray-300">

            <div class="left-0 right-0 flex justify-between pt-2 text-sm text-primary">
              <p class="font-bold">Total Price</p>
              <p>Rp 4.000.000,00</p>
            </div>

            <a href=""
              class="flex items-center justify-center w-full px-5 py-3 mt-3 text-sm font-medium text-white transition duration-200 ease-in-out hover:shadow-lg rounded-xl bg-secondary hover:bg-lightgreen hover:text-primary">Make
              a Payment</a>

          </div>
        </div>

      </div>

    </div>
  </div>
@endsection
