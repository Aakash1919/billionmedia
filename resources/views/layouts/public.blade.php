<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/mobile.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/front/css/aos.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/front/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/slick-them-one.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/slick-them-tow.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap">
  <title>{{ config('app.name', 'BillionMedia') }}</title>
</head>
<body>
  @include('components.header.front-header')
  @yield('content')
  @include('components.footer.front-footer')
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/aos.js') }}"></script>
  @stack('scripts')
  <script>
    AOS.init({
        duration: 1200,
    })
</script>
<script>
    window.onscroll = function () { myFunction() };
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
</body>

</html>