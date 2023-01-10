<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | {{ $title ?? '' }}</title>
        {{-- bootstrap --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.1/dist/alpine.js" defer></script>

        <style>
@media only screen and (max-width: 767px) {
    .login-background{
            display: none;
    }
    
}
/* .login-background{
    background: url('/images/how-it-works-img4.png')no-repeat;
    width: 100%;
    height: 100%;
} */
@media (min-width: 992px) { 
    .flex-div{
        display: flex;
    }
    .login-page{
        width: 50%;
    }
 }
        </style>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        {{-- <script src="/js/app.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>

            
                  var items = ['/images/login-img-2.jpg', '/images/login-img-3.jpg', '/images/login-img-1.jpg', '/images/login-img-4.jpg'];
  var item = items[Math.floor(Math.random() * items.length)];
  jQuery('.login-background').css('background-image', `url("${item}")`);
            </script>
                
    </body>
</html
