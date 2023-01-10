<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">

    <style>
   
    
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
    </style>
</head>
<body>
    
<header>
    <div class="container">
        <div class="row text-center">
            <div class="col mt-4">
                    <img src="/images/logo.png" alt="">           
            </div>       
        </div>
    </div>
</header>

<section class="checkout-section">
<div class="container">
    <div class="row">
        <div class="col-lg-6">
        <input id="card-holder-name" type="text">
        <div id="card-element"></div>

<button id="card-button">
    Process Payment
</button>
        </div>
    </div>


    
</div>
</section>


<script src="https://js.stripe.com/v3/"></script>
<script src="/js/app.js"></script>

<script>
    const stripe = Stripe('pk_test_51HV2mnH4Ct5PLCrYD1GEwIjDwa2UjzjQcRhQCEsOwgLuGvx0rbXoATf5UPzGCtot1XQQvYb4bnhaI2KFYLYdqdam00uNa44BOB');

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');
</script>
<script>
const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

cardButton.addEventListener('click', async (e) => {
    cardButton.disabled = true;
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );

    if (error) {
        cardButton.disabled = false;
        swal(error.code, error.message, "error");
    } else {
        const rawResponse = fetch("{{ route('payment.store', $order->id,) }}", {
            method: 'POST',
            body: JSON.stringify({paymentMethod: paymentMethod.id, _token: "{{ csrf_token() }}"}),
            headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
        }).then(data => {
            return data.json();
        }).then(data => {
            if(data.success) {
                swal('Paid', 'You have paid successfully', 'success');
                setTimeout(function(){ window.location = '/'; }, 3000);
            }
        })
    }
});

</script>

</body>
</html>

