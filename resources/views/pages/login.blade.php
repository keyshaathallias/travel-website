@extends('layouts.loginLayout')

@section('content')
  <form action="{{ route('login.login') }}" method="POST" class="lg:w-[550px] w-[350px]">
    @csrf
    <div class="heading">
      <h1 class="text-2xl font-semibold lg:text-3xl text-dark">Welcome back 👋</h1>
      <p class="text-sm font-medium leading-6 text-secondary">Please enter your email and password.</p>
    </div>
    <div class="relative pt-8">
      <label for="email" class="text-sm font-medium text-primary">Email</label>
      <input type="email" name="email" id="email"
        class="py-3 my-3 rounded-xl pe-5 ps-5 bg-light text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
        placeholder="Input your email...">
    </div>

    <div class="relative pt-2">
      <label for="password" class="text-sm font-medium text-primary">Password</label>
      <input type="password" name="password" id="password"
        class="py-3 my-3 rounded-xl pe-5 ps-5 bg-light text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
        placeholder="Input your password...">
      <i class="bi bi-eye-fill absolute top-[55%] right-3 transform cursor-pointer text-secondary"
        id="togglePassword"></i>
    </div>

    <div class="flex flex-col w-full gap-3 mt-5 mb-3 text-center">
      <button type="submit"
        class="w-full px-5 py-2 text-sm font-medium text-white transition duration-200 ease-in-out hover:shadow-lg rounded-xl bg-secondary hover:bg-lightgreen hover:text-primary lg:text-base">Login</button>
    </div>

    <div class="justify-between lg:flex">
      <a href="{{ route('register') }}" class="text-xs text-left text-gray-500">Don't have an account? <span
          class="transition duration-200 ease-in-out transform text-secondary hover:text-primary">Create
          Account</span></a>
          <br>
      <a href="/changepassword" class="text-xs text-left text-gray-500">Forgot Password?</a>
    </div>

  </form>
@endsection
