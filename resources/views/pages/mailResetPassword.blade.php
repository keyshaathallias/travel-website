<form action="{{ route('forgot.password.act') }}" method="POST" class="lg:w-[550px] w-[350px]">
  @csrf
  <div class="heading">
    <h1 class="text-2xl font-semibold lg:text-3xl text-dark">Reset Password</h1>
    <p class="text-sm font-medium leading-6 text-secondary">You just received the reset password link, please click the
      button below to change your password!</p>
  </div>

  <div class="flex flex-col w-full gap-3 mt-5 mb-3 text-center">
    <a href="{{ route('validation.forgot.password', ['token' => $token]) }}"
      class="w-full px-5 py-2 text-sm font-medium text-white transition duration-200 ease-in-out hover:shadow-lg rounded-xl bg-secondary hover:bg-lightgreen hover:text-dark lg:text-base">Click
      Here</a>
  </div>
</form>
