<div>
  {{-- <style>
    .loading{
    position: relative;
    }

    .loading:after {
        content: 'Please wait while we are processing payment ....';
        background-color: rgba(255,255,255,.6);
        width: 100%;
        top: 0;
        bottom: 0;
        /* background-image: url(/images/loader.svg); */
        position: absolute;
        background-repeat: no-repeat;
        background-position: center center;
        justify-content: center;
        display: flex;
        align-items: center;
        color: #B22234;
        /* font-weight: bold; */
        font-size: 20px;
    }
  </style> --}}
  <table class="table table-responsive-sm">
    <thead>
      <tr>
        <th class="h5-heading" scope="col">Title</th>
        <th class="h5-heading" scope="col">Status</th>
        <th class="h5-heading text-center" scope="col">Payment Status</th>
        <th class="h5-heading text-center" scope="col">Price</th>
        <th class="h5-heading text-center" scope="col">Created</th>
        <th class="h5-heading text-center" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
          <td class="product-name-list">{{ $order->service->name }} </td>
          <td class="status  order-{{str_replace(' ', '', $order->order_status) }}"><span>{{   $order->order_status }}</span></td>
          <td  class="status d-flex justify-content-center payment-{{str_replace(' ', '', $order->payment_status) }}">
            <span class="payment-status status-{{ $order->payment_status }}">{{   $order->payment_status }}</span>
            @if($order->payment_status == 'pending' && $order->order_status != 'refund request')
              <a href="javascript:;" class="pay-now" wire:click="updatePaymentOrderId({{ $order->id }})">Paid</a>
            @endif
          </td>
          <td class="listing-price ">${{ $order->price }}</td>
          <td class="listing-date ">{{ $order->created_at->format('d/m/Y') }}</td>
          <td class="view-order-link text-center">
            <a href="{{ route('orders.show', $order->order_id) }}">View Order</a>

            </td>
        </tr>
        
        @endforeach
  
    
    </tbody>
  </table>
  
  <div
    class="modal fade paid-modal"
    id="payment-modal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    wire:ignore.self
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content"  wire:loading.class="loading" wire:target="processPayment">
        <div class="modal-header ">
          <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->

        
          <div class="close-div">
            <img src="../images/Vector.png" alt="" />
            <button
              type="button"
              class="btn arrow-close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <div class="modal-body pb-0 ">
            @if($targetted_order)

          <div class="text-center justify-content-center">
            <img src="/images/icon-tshirt.png" alt="" />
            <h4 class="modal-heading"  id="exampleModalLabel">Payment</h4>
          </div>
          <div class="payment-modal-pricing">
            <div class="user-purchased-services pb-2">
              <div
                class="pricing d-flex justify-content-between align-items-center"
              >
                <h4 class="h4-heading">{{$targetted_order->service->category->name ?? ''}} - <span >{{$targetted_order->service->name}}</span></h4>
              </div>
              <div
                class="pricing d-flex justify-content-between align-items-center"
              >
                <h4 class="h4-heading pt-3 pb-2">Sub-Total</h4>
                <div class="d-flex align-items-center">
                  <span class="currency-div">USD</span>
                  <span class="price">${{$targetted_order->price}}</span>
                </div>
              </div>
              <hr>
              <div class="d-flex justify-content-between align-items-center">
                <h4 class="h4-heading pt-3 pb-2">Total</h4>
                <div class="d-flex align-items-center">
                  <span class="currency-div">USD</span>
                  <span class="price">${{$targetted_order->price}}</span>
                </div>
              </div>
            </div>
          </div>
          @endif

          <div class="payment-system">
            {{-- <div class="payment-method">
                <h3>Payment information</h3>
            </div> --}}
            @if(auth()->check() && count($payment_methods))
                <ul class="list-group">
                    @foreach($payment_methods as $payment_method)
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_payment_method" id="pm-radio-{{ $loop->iteration }}" value="{{$payment_method['id']}}" checked wire:model="user_payment_method" :key="'user_payment_method-'.$loop->iteration">
                            <label class="form-check-label" for="pm-radio-{{ $loop->iteration }}">
                                {{ $payment_method['brand'] }} -- {{ str_pad($payment_method['last4'], 8, '*', STR_PAD_LEFT) }}
                            </label>
                        </div>
                    </li>
                    @endforeach
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_payment_method" value="new" id="pm-radio-{{ count($payment_methods) + 1 }}" wire:model="user_payment_method" {{ !count($payment_methods) ? 'checked' : '' }} :key="'user_payment_method-'.count($payment_methods) + 1">
                            <label class="form-check-label" for="pm-radio-{{ count($payment_methods) + 1 }}">
                                Add New
                            </label>
                        </div>
                    </li>
                </ul>
                @if($user_payment_method == 'new')
                    <div class="form-fields">
                        <input id="card-holder-name" type="text" class="form-control" placeholder="Name on Card:">
                    </div>
                    <div class="card" wire:ignore>
                        <div id="card-element"></div>
                        <div class="pl-5">
                            <div class="form-group form-check mt-4">
                                <input type="checkbox" class="form-check-input" id="save-pm-check" wire:model="save_payment_method">
                                <label class="form-check-label" for="save-pm-check">Save Card</label>
                            </div>
                        </div>
                    </div>   
                @endif
            @else
                <div class="form-fields">
                    <input id="card-holder-name" type="text" class="form-control" placeholder="Name on Card:">
                </div>
                <div class="card" wire:ignore>
                    <div id="card-element"></div>
                    <div class="pl-5">
                        <div class="form-group form-check mt-4">
                            <input type="checkbox" class="form-check-input" id="save-pm-check" wire:model="save_payment_method">
                            <label class="form-check-label" for="save-pm-check">Save Card</label>
                        </div>
                    </div>
                </div>        
            @endif
            <div class="text-center pb-4 pt-4">
              @if($payment_error)
                <div class="alert alert-danger">
                  {{ $payment_error }}
                </div>
              @endif
            <div class="card-button">
                @if($user_payment_method == 'new' || !$user_payment_method)
                    <button id="card-button" class="btn dashboard-main-btn">Pay Now</button>
                    @else
                    <button wire:click="processPayment()" class="btn dashboard-main-btn mb-3">Pay Now</button>
                @endif
            </div>
              <div class="payment-process text-center">
                <p>100% secure payments processed by <span>stripe</span></p>
              </div>
              <img src="../images/payment-process-img-1.png" alt="" /><br />
              <img src="../images/payment-process-img-2.png" alt="" />
            </div>
            {{-- <div class="private pt-2">
                <p><i class="fas fa-lock pr-2"></i>100% secure payments processed by <span>stripe</span></p>
            </div>
            <div class="images">
                <img src="/images/1.png" alt="" style="width:11%;">
                <img src="/images/2.png" alt="" style="width:11%;">
                <img src="/images/3.png" alt="" style="width:11%;">
                <img src="/images/10.png" alt="" style="width:11%;">
                <img src="/images/14.png" alt="" style="width:11%;">
                <img src="/images/16.png" alt="" style="width:11%;">
                <img src="/images/22.png" alt="" style="width:11%;">
            </div> --}}
            {{-- <div class="logo-standard">
                <img src="/images/le-logo-standard.png" alt="" style="width:17%;">
            </div> --}}
        </div>
         
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
     document.addEventListener('livewire:load', function () {
        var apiKey = "{{ env('STRIPE_KEY') }}";
        const stripe = Stripe(apiKey);
        const elements = stripe.elements();
        const cardElement = elements.create('card');

        // display payment modal
        Livewire.on('paymentOrderUpdated', function(){
            $('#payment-modal').modal('show')
        });

        // setup stripe listener
        Livewire.on('setupStripe', function(){
            cardElement.mount('#card-element');
        });

        // Send Stripe request
        Livewire.on('stripeRequest', function(){
            // send stripe request
            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const paymentForm = document.querySelector('#payment-modal .modal-content');
            if(cardButton) {
                cardButton.addEventListener('click', async (e) => {
                    if(!window.paymentMethod) {
                        paymentForm.classList.add('loading');
                        const { paymentMethod, error } = await stripe.createPaymentMethod(
                                'card', cardElement, {
                                    billing_details: { name: cardHolderName.value }
                                }
                            );    
                        // cardButton.disabled = true;
    
                        if (error) {
                            paymentForm.classList.remove('loading');
                            cardButton.disabled = false;
                            swal(error.code, error.message, "error");
                        } else {
                            window.paymentMethod = paymentMethod.id;
                            Livewire.emit('paymentMethodAdded', paymentMethod.id);
                        }
                    } else {
                        Livewire.emit('paymentMethodAdded', window.paymentMethod);
                    }
                });
            }
        })
     });
</script>
