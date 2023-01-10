<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/style.css">

</head>
<body>
    
    <section class="thankyou-section">
        <div class="container">
        <div class="row justify-content-center">
          
            <div class="col-lg-6 col-12">
            <div class="thankyou-content">
                <div class="text-center justify-content-center">
                <img src="/images/thankyou-icon.png" alt="">
                <h6 class="thankyou-title pt-3">Payment Successful</h6>
            <h1 class="thankyou-heading">Thank You</h1>
          
        </div>
            <div class="thankyou-message">
            <h4>Hey {{ ucfirst($order->user->first_name) }},</h4>
            <p class="thankyou-text">Thanks for your order. We promise you to deliver your <span>{{ $order->service->name }}</span> design in next two days.</p>
            <p class="thankyou-text">First you need to fill out simple brief form. It helps our designers to understand your brand and specifically
                design your <span>{{ $order->service->name }}</span>.</p>
                <div class="text-center pt-4">
                <p class="thankyou-text mb-0">Let's create your <span>{{ $order->service->name }}</span> design brief.</p>
              <a href="{{ route('orders.brief.index', $order->id) }}"><button class="btn btn-radius">Create Brief</button></a>
            </div>
            <span class="thankyou-text text-center d-block pt-4"> or go back to <a  href="{{ route('orders.index') }}">dashboard.</a></span>
            </div>
                </div>
            </div>
         
        </div>
    </div>
</div>
</section>

</body>
</html>


