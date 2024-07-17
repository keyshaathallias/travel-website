@extends('layouts.loginLayout')

@section('content')
  <form action="{{ route('forgot.password.act') }}" method="POST" class="lg:w-[550px] w-[350px]">
    @csrf
    <div class="heading">
      <h1 class="text-2xl font-semibold lg:text-3xl text-dark">Reset Password</h1>
      <p class="text-sm font-medium leading-6 text-secondary">Please input your registered email.</p>
    </div>
    <div class="relative pt-8">
      <label for="email" class="text-sm font-medium text-primary">Email</label>
      <input type="email" name="email" id="email"
        class="py-3 my-3 rounded-xl pe-5 ps-5 bg-light text-xs border-2 border-lightgreen w-full h-[38px] text-dark"
        placeholder="Input your email">
    </div>
    <div class="flex flex-col w-full gap-3 mt-5 mb-3 text-center">
      <button type="submit"
        class="w-full px-5 py-2 text-sm font-medium text-white transition duration-200 ease-in-out hover:shadow-lg rounded-xl bg-secondary hover:bg-lightgreen hover:text-dark lg:text-base">Submit</button>
    </div>
    <a href="/" class="text-xs text-left text-gray-500">← Back to log in</a>
  </form>
@endsection
