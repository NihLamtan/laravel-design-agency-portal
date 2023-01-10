<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/checkout-page-css/css/style.css">
    @livewireStyles

    <title>Logoinusa | Checkout </title>
    <link rel="shortcut icon" href="{{ asset('images/fevicon/favicon-16x16.png') }}">


    <style>
      
        .StripeElement{
            margin: 0px 30px 20px 30px;
        }
    </style>
</head>

<body>
    <div class="checkout-header">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-6">
                    <div>
                       <a href="/"><img src="/images/logo.png" class="img-fluid" alt=""></a>
                    </div>
                </div>
                @if(auth()->user())
                    <div class="col-lg-3 col-6  d-flex justify-content-end">
                            <a href="{{ route('orders.index') }}"><button class="btn btn-primary">Orders</button></a>
                    </div>
                @else
                    <div class="col-lg-3 col-6 d-flex justify-content-end">
                        <a href="{{ route('login') }}"><button class="btn btn-primary">Sign in</button></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <section class="checkout-section">
        @livewire('checkout.form', [
            'service' => $service,
            'service_package' => $service_package
        ])   
       
     </section> 
{{--  <livewire:checkout.form :service="$service" :service_package="$service_package"  /> --}}

@livewireScripts

<script src="https://js.stripe.com/v3/"></script>
{{-- <script src="/js/app.js"></script> --}}

@if(!auth()->check() || !auth()->user()->paymentMethods()->count())
<script>
    document.addEventListener("DOMContentLoaded", function(){
        Livewire.emit('setupStripe')
        Livewire.emit('stripeRequest')
    })
</script>
@endif
</body>

</html>