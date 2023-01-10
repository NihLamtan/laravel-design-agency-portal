
<div>
    <div class="container">
        <div class="checkout-form" id="payment-form" wire:loading.class="loading" wire:target="submit">
        <div class="row">
            <div class="col-lg-7 col-12">
                @include('partials.alerts')
                <form  id="checkout-form" wire:submit.prevent="submit">
                    @if(!auth()->check())
                    <div class="form-header">
                        <h3>Billing Information</h3>
                    </div>
                    <div class="form-fields">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="first_name">First name <span class="required">(required)</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                        name="first_name" wire:model="first_name" >
            
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                    @enderror
                                </div>
            
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="last_name">Last name <span class="required">(required)</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                        name="last_name" wire:model="last_name" {{ auth()->check() ? 'disabled' : '' }}>
            
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
            
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email address <span class="required">(required)</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" wire:model="email" >
            
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Tel. number </label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" wire:model="phone" {{ auth()->check() ? 'disabled' : '' }}>
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-header address">
                        <h3>
                            Billing Address
                        </h3>
                    </div>
                    <div class="form-fields">
                        <div class="form-group">
                            <label for="address">Address </label>
                            <input type="text" class="form-control"
                                id="address" name="address" wire:model="billing_address.address" >
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="state">State </label>
                                    <x-select-state name="state" id="state" class="form-control"
                                    required wire:model="billing_address.state" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city"
                                        name="city" wire:model="billing_address.city">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="postal_code">Postal/Zip Code </label>
                                    <input type="number" class="form-control"
                                        maxlength="10" id="postal_code" name="postal_code" wire:model="billing_address.postal_code">
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="make_address_default" wire:model="make_address_default" value="1" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              Mark As default
                            </label>
                          </div>
                          
                    </div>
                    <button type="submit" id="submit-button" style="display:none"></button>
                </form>
            {{-- @endif --}}
            {{-- <div class="col-7"> --}}
            <div class="order-summary mt-0">
                <div class="order-summary-header">
                    <h4>Apply Coupon</h4>
                </div>
                <div class="order-content p-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="COUPON CODE" wire:model="coupon_code" aria-label="COUPON CODE" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" wire:click="applyCoupon">Apply</button>
                        </div>
                    </div>
                    @if($coupon_message)
                        <div class="text-{{$coupon_class}} mt-2">{{ $coupon_message }}</div>
                    @endif
                </div>
            </div>
            <div class="order-summary">
                <div class="order-summary-header">
                    <h4>Order summary</h4>
                </div>
                <div class="order-content">
                    <div class="order-description">
                       
                        <img src="/images/icon-Explainer-video-white-board-animation.svg" class="img-fluid" alt="">
                        <div class="description">
                            {{-- <h5>{{ $service->category->name ?? ''}} - {{$service->name}}</h5> --}}
                            <p>{!! implode(', ', $service->features) !!}</p>
                        </div>
                        <div class="price">
                            {{-- <h5><span><span class="currency">USD</span>${{$service->price}}</span> </h5> --}}
                        </div>
                    </div>
                    <div class="sub-total">
                        <h5 class="d-flex justify-content-between">Sub-Total:</h5>
                        <div class="price">
                            <h5><span><span class="currency">USD</span>${{$service->price}}</span></h5>
                        </div>
                    </div>
                    @if($discount)
                    <div class="sub-total">
                        <h5 class="d-flex justify-content-between">Discount:</h5>
                        <div class="price">
                            <h5><span><span class="currency">USD</span>${{$discount}}</span></h5>
                        </div>
                    </div>
                    @endif
                    <div class="total">
                        <h5 class="d-flex justify-content-between">Total:</h5>
                        <div class="price">
                            <h5><span><span class="currency">USD</span>${{$service->price - $discount}}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="payment-system">
                <div class="payment-method">
                    <h3>Payment information</h3>
                </div>
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
                        <div class="card">
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
                <div class="card-button">
                    @if($user_payment_method == 'new' || !$user_payment_method)
                        <button id="card-button" class="btn checkout-button">Pay Now</button>
                        @else
                        <button wire:click="$emit('paymentMethodUpdated')" class="btn checkout-button">Pay Now</button>
                    @endif
                </div>
                <div class="private pt-2">
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
                </div>
                <div class="logo-standard">
                    <img src="/images/le-logo-standard.png" alt="" style="width:17%;">
                </div>
            </div>
            
            
            </div>
            <div class="col-lg-5 col-md-8 col-12">
                <div class="graphic-design">
                    {{-- <img src="{{ $service->category->image_path  }}" alt=""> --}}
                    <h5>{{ ucfirst($service->category->name ?? '')}} - <span>{{$service->name}}</span></h5>
                    <ul class="features">
                        @foreach ($service->features as $feature)
                            
                        <li><i class="fas fa-check"></i>{{ $feature }}</li>

                        @endforeach
                     
                    </ul>

                    
                </div>
                @if($service_package)
                <div class="graphic-design mt-4">
                    <h3>Service Package</span></h3>
                    <div class="pt-3">
                    <div class="d-flex">    
                        <h5 class="pr-2">Package Name:</h5>
                        <p class="mb-0">{{ $service_package->title }}</p>
                    </div>
                    <hr>
                    <div class="d-flex">    
                        <h5 class="pr-2">Package Description:</h5>
                        <p>{{ $service_package->description }}</p>
                    </div>
                    <hr>
                    <div class="d-flex">    
                        <h5 class="pr-2">Package Amount:</h5>
                        <p>${{ $service_package->amount }}</p>
                    </div>
                    <hr>

                </div>
                </div>
            @endif
                
                <div class="checkout-testimonial">
                    <div class="testimonial-content">
                        <h4>They are building Awesomic into a great company</h4>
                        <p class='para'>Awesomic impressed with their creative designs and dedication to customer success. With their iterative process, it was easy for the internal team to submit feedback.</p>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center">
                                    <img src="/images/admin-img.png" class="img-fluid mr-2" style="width: 25%"alt="">
                                    <div>
                                        <h6>Michael Holkesvik</h6>
                                        <p>CTO, SilviaTerra</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="d-flex align-items-center justify-content-end">
                                    <h6 class="star-rate">5.0</h6>
                                    <div>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="text-right">Verified by Clutch</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="checkout-testimonial">
                    <div class="testimonial-content">
                        <h4>They are building Awesomic into a great company</h4>
                        <p class='para'>Awesomic impressed with their creative designs and dedication to customer success. With their iterative process, it was easy for the internal team to submit feedback.</p>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center">
                                    <img src="/images/admin-img.png" class="img-fluid mr-2" style="width: 25%"alt="">
                                    <div>
                                        <h6>Michael Holkesvik</h6>
                                        <p>CTO, SilviaTerra</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="d-flex align-items-center justify-content-end">
                                    <h6 class="star-rate">5.0</h6>
                                    <div>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="text-right">Verified by Clutch</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>       
        </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {

            var apiKey = "{{ env('STRIPE_KEY') }}";
            const stripe = Stripe(apiKey);
            const elements = stripe.elements();
            const cardElement = elements.create('card');

            // submit form on successfull stripe
            Livewire.on('paymentMethodUpdated', function() {
                // document.getElementById('payment-method').value = paymentMethod;
                // @this.payment_method = paymentMethod;
                document.getElementById('submit-button').click();  
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
                const paymentForm = document.getElementById('payment-form');
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


        })
    </script>
</div>
