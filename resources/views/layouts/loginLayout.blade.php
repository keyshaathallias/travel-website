<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mimi Travel</title>
  @vite('resources/css/app.css')

  {{-- Link Favicon --}}
  <link rel="icon" href="/img/favicon.svg"type="image/x-icon">

  {{-- Link Icon Bootstrap --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  {{-- Link Font Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>

<body class="font-poppins">
  <nav class="px-6 pb-4 pt-7">
    <div class="container mx-auto">
      <img src="/img/Logo.svg" alt="Logo" style="width: 140px">
    </div>
  </nav>
  <div class="flex flex-col justify-center lg:flex-row">
    <div class="container flex-1 pt-8 ml-12 lg:pt-16">
      @yield('content')
    </div>
    <div class="container relative flex-col flex-1 mt-6 ml-4 lg:mt-0 lg:ml-0">
      <img src="/img/Cover travel web.png" alt="Cover" class="lg:h-auto lg:w-full w-[400px]">
      <img src="/img/trip-animate.svg" alt="Illustration" class="w-[400px] lg:w-[800px] absolute top-1">
    </div>
  </div>
  @include('partials.footer')

  <script>
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordField = document.getElementById('password');
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);

      this.classList.toggle('bi-eye-fill');
      this.classList.toggle('bi-eye-slash-fill');
    });
    
    document.getElementById('togglePassword2').addEventListener('click', function() {
      const passwordField = document.getElementById('confirmpassword');
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);

      this.classList.toggle('bi-eye-fill');
      this.classList.toggle('bi-eye-slash-fill');
    });
  </script>
</body>
@include('sweetalert::alert')

</html>
