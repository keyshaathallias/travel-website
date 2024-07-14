<nav class="px-6 py-4 m-4 mt-2 rounded-full bg-lightgreen font-poppins">
  <div class="container mx-auto">
    <div class="flex justify-between">
      <img src="/img/Logo.svg" alt="Logo" style="width: 130px">

      <ul class="items-center justify-center hidden text-center lg:block">
        <div class="flex mt-2">
          <li>
            <a href="{{ route('explore.index') }}"
              class="flex flex-col items-center justify-center transition duration-200 ease-in-out transform text-secondary hover:text-primary {{ Request::is('explore') ? 'text-primary' : 'text-secondary' }}">
              <span class="text-sm font-medium">Explore</span>
            </a>
          </li>
          <li class="px-16">
            <a href="{{ route('cart.index') }}"
              class="flex flex-col items-center justify-center transition duration-200 ease-in-out transform text-secondary hover:text-primary {{ Request::is('cart') ? 'text-primary' : 'text-secondary' }}">
              <span class="text-sm font-medium">Cart</span>
            </a>
          </li>
        </div>
      </ul>

      <form action="{{ route('logout') }}" method="post" class="hidden lg:block">
        @csrf
        <button type="submit"
          class="text-white bg-red-500 transition duration-200 ease-in-out transform hover:bg-red-600 py-1.5 px-4 rounded-full flex items-center gap-1">
          <i class="text-white bi bi-box-arrow-right"></i>
          <span class="text-xs">Logout</span>
        </button>
      </form>
    </div>
  </div>

  {{-- Mobile --}}
  <div class="fixed bottom-0 left-0 right-0 px-6 py-2 m-4 bg-lightgreen rounded-2xl lg:hidden">
    <ul class="flex items-center justify-center gap-16 px-16 text-center">
      <li>
        <a href="{{ route('explore.index') }}"
          class="flex flex-col items-center justify-center text-primary hover:text-dark"
          {{ Request::is('explore') ? 'text-primary' : 'text-secondary' }}>
          <i class="text-xl bi bi-globe2"></i>
          <span class="text-base">Explore</span>
        </a>
      </li>
      <li>
        <a href="{{ route('cart.index') }}"
          class="flex flex-col items-center justify-center text-primary hover:text-dark"
          {{ Request::is('cart') ? 'text-primary' : 'text-secondary' }}>
          <i class="text-2xl bi bi-cart4"></i>
          <span class="text-base">Cart</span>
        </a>
      </li>
      <li>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit"
            class="flex flex-col items-center justify-center text-red-500 transition duration-200 ease-in-out transform hover:text-red-700">
            <i class="text-xl bi bi-box-arrow-right"></i>
            <span class="text-base">Logout</span>
          </button>
        </form>
      </li>
    </ul>
  </div>
</nav>
