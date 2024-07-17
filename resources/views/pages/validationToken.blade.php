@extends('layouts.loginLayout')

@section('content')
  <form action="{{ route('validation.forgot.password.act') }}" method="POST" class="lg:w-[550px] w-[350px]">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="heading">
      <h1 class="text-2xl font-semibold lg:text-3xl text-dark">Reset Password</h1>
      <p class="text-sm font-medium leading-6 text-secondary">Please input your registered email.</p>
    </div>
    <div class="relative pt-8">
      <label for="password" class="text-sm font-medium text-primary">Password</label>
      <input type="password" name="password" id="password"
        class="py-3 my-3 rounded-xl pe-5 ps-5 bg-light text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
        placeholder="e.g. p4ss08">
      <i class="bi bi-eye-fill absolute top-[63%] right-3 transform cursor-pointer text-secondary"
        id="togglePassword"></i>
    </div>
    <div class="flex flex-col w-full gap-3 mt-5 mb-3 text-center">
      <button type="submit"
        class="w-full px-5 py-2 text-sm font-medium text-white transition duration-200 ease-in-out hover:shadow-lg rounded-xl bg-secondary hover:bg-lightgreen hover:text-dark lg:text-base">Reset
        Password</button>
    </div>
  </form>
@endsection
