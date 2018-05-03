<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('title','Default')| Pre-denuncia</title>
  <link rel="icon" href="{{ asset('img/iconofge.png') }}">
  {{-- plantilla web --}}
  {{-- <link href="https://rawcdn.githack.com/Romaincks/assets/master/css/font-neosans.css" rel="stylesheet" --}}
  <link href="{{ asset('https://rawcdn.githack.com/Romaincks/assets/master/style.css') }} " rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ asset('css/theme-jquery-validation.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

  @yield('csss')
</head>
<body>

  @include('template.partials.nav2')


         <section class="content">
            <div class="container">
           @yield('content')
            </div>
          </section>

  <!-- jQuery -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js')}}" ></script>
<script src="{{ asset('js/bootstrap.min.js')}}" ></script>
<script src="{{asset ('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('plugins/select2/select2.min.js')}}" ></script>
<script src="{{ asset('js/jquery.form-validator.min.js')}}" ></script>
<script src="{{ asset('js/toastr.min.js')}}"></script>
<script>
    $("input:text").focusout(function() {
          $(this).val($(this).val().toUpperCase());
        });
    $("textarea").focusout(function() {
      $(this).val($(this).val().toUpperCase());S
    });

  
  
    $('select').select2();

     $.validate({
        lang:'es'
    });
    

    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-center",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "400",
      "hideDuration": "1000",
     "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    
  </script>
 @yield('pilaScripts')
 @include('sweet::alert')
 @include('template.partials.footer2')
 </body>
</html>
