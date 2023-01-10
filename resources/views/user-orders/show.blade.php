  @extends('layouts.user-dashboard')


@section('title', 'Order View')
@section('nav-bar')

<main id="main-sec">
    <x-user-dashboard-navbar/>
</main>

@endsection 

 @section('content')

 <section id="section-view-order">
  <div class="container">
    @if($order->payment_status == 'pending')
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <div class="danger-border alert-wrap-for-user">
          <p class="alert-content message-danger m-0">
            <span class="alert-client-name">Hey {{ auth()->user()->first_name }}</span>,<span
              class="unpaid-text"
              >Your payment is unpaid, we hope you will pay it.</span
            ><span class="thanks">Thanks</span>
          </p>
        </div>
      </div>
    </div>
    @endif
    @if(!$order->brief)
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <div class="warning-border alert-wrap-for-user ">
        <div class="d-flex align-items-center justify-content-between p-1">
          <p class="alert-content message-warning m-0 ">
            <span class="alert-client-name">Hey {{ auth()->user()->first_name }}</span>,<span
              class="unpaid-text"
              >Your order brief is empty, please create your order brief.</span
            ><span class="thanks">Thanks</span>
              </p>

  <a class="btn dashboard-main-btn" href="{{ route('orders.brief.index', $order->id) }}">Create Brief
                </a>
              </div>
        </div>
      </div>
    </div>
    @endif
    @if($order->order_status == 'pending')
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <div class="order-pending-border alert-wrap-for-user ">
         
          <p class="alert-content message-order-pending m-0 ">
            <span class="alert-client-name">Hey {{ auth()->user()->first_name }}</span>,<span
              class="unpaid-text"
              >Your Order is on pending we hope will fullfilled it. thanks</span
            ><span class="thanks">Thanks</span>

          </p>
          

        </div>
      </div>
    </div>
    @endif
    @if($order->order_status == 'completed')
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <div class="order-completed-border alert-wrap-for-user ">
         
          <p class="alert-content message-order-completed m-0 ">
            <span class="alert-client-name">Hey {{ auth()->user()->first_name }}</span>,<span
              class="unpaid-text"
              >Your Order is on pending we hope will fullfilled it. thanks</span
            ><span class="thanks">Thanks</span>

          </p>
          

        </div>
      </div>
    </div>
    @endif


    <div class="row">
      <div class="col-lg-12">
        <div class="logo-design-main-wrap">
          <div class="logo-design-area">
            <div class="row m-0 justify-content-between">
              <div class="col-lg-7 p-0">
                <div
                  class="logo-design-img-area d-flex align-items-center"
                >
                  <img src="../images/Group.png" alt="" class="" />
                  <h4 class="logo-deign-hd">
                    {{ $order->service->category->name }} - 
                    <span class="premium-package">{{  $order->service->name}}</span>
                  </h4>
                </div>
              </div>
              <div class=".offset-lg-1 col-lg-4 p-0">
                <div class="d-flex justify-content-end">
                  
            <button
            class="btn  dashboard-main-btn
            btn btn-primary
            rounded-pill
            mark-as-btn"
            data-toggle="modal"
            data-target="#review-modal"
          >
            Mark as complete
          </button>
                  @if($order->refundable())
                  <a class="refund-button dashboard-main-btn
                  btn btn-primary 
                  refund-btn" data-order_id="{{ $order->id }}" href="javascript:;">
                  Refund</a>
                @endif
               
                </div>
              </div>
            </div>
          </div>
          @if($order->description)
          <div class="logo-design-area">
            <div class="row m-0">
              <div class="col-lg-12 p-0">
                <h5 class="view-order-sub-hd">description</h5>
                <div class="description-content-area">
                  <p class="description-content">
                  {{ $order->service->description }}
                  </p>
               
                </div>
              </div>
            </div>
          </div>
          @endif
          <div class="logo-design-area">
            <div class="row m-0 justify-content-between">
              <div class="col-lg-12 p-0">
                <h5 class="view-order-sub-hd feature-hd">features</h5>
              </div>
            </div>
            <div class="row m-0 justify-content-between">
              @if($order->service && $order->service->features)
              @foreach ($order->service->features as $feature)
              <div class="col-3 p-0">
                <div class="d-flex feature-content-area">
                  <img
                    src="../images/simple-check.svg"
                    alt=""
                    class="feature-content-check"
                  />
                  <h6 class="feature-content">{{ $feature }}</h6>
                </div>
             
              </div>
              @endforeach
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <table class="table table-responsive-sm">
          <thead>
            <tr>
              <th  scope="col">Status</th>
              <th class="text-center" scope="col">Payment Status</th>
              <th class="text-center" scope="col">Price</th>
              <th class="text-center" scope="col">Created</th>
              <th class="text-center" scope="col">Due Date</th>
            </tr>
          </thead>
          <tbody>
        <tr>
          <td class="status  order-{{str_replace(' ', '', $order->order_status) }}"><span>{{   $order->order_status }}</span></td>
          <td  class="status d-flex justify-content-center payment-{{str_replace(' ', '', $order->payment_status) }}">
           
            <span class="payment-status status-{{ $order->payment_status }}">{{   $order->payment_status }}</span>
            @if($order->payment_status == 'pending' && $order->order_status != 'refund request')
              <a href="javascript:;" class="pay-now" wire:click="updatePaymentOrderId({{ $order->id }})">Paid</a>
            @endif
          </td>
          <td class="listing-price text-center ">${{ $order->price }}</td>
          <td class="listing-date text-center">{{ $order->created_at->format('d/m/Y') }}</td>
          @if($order->due_date)
          <td class="listing-date text-center">{{ $order->due_date->format('d/m/Y') }}</td>
         @endif
        </tr>
        
        
          
          </tbody>
        </table>
      
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        @if($order->brief)

        <div class="logo-design-main-wrap brief-wrap">
          <div class="logo-design-area">
            <div class="row m-0 justify-content-between">
              <div class="col-lg-12 p-0">
                <div
                  class="logo-design-img-area d-flex align-items-center"
                >
                  <h4 class="view-order-sub-hd brief-hd m-0">
                    Order Brief
                  </h4>
                </div>
              </div>
            </div>
          </div>
          <div class="logo-design-area">
            <div class="row m-0">
              <div class="col-lg-12 p-0">

              <x-logo-order-brief :order="$order" :instructions="$order->brief->instructions"/>
                
              </div>
            </div>
          </div>
          
          </div>
@endif

        </div>
      </div>
      @if ($order->attachments->count() > 0)

      <div class="row">
          <div class="col-lg-12">
            <div class="logo-design-main-wrap mb-0">
              <div class="logo-design-area">
                <div class="row m-0 justify-content-between">
                  <div class="col-lg-12 p-0">
                    <div
                      class="logo-design-img-area d-flex align-items-center"
                    >
                      <h4 class="view-order-sub-hd brief-hd m-0">
                          Attachements
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
             
              
              </div>
            </div>
          </div>
        
            
          <div class="row">
              <div class="col-lg-12 col-md-12 col-12">
          <livewire:order.discussion-attachments :order="$order" />
             
              </div>
            </div>
            @endif
         
          
            <div class="row">
              <div class="col-lg-12">
                <div class="logo-design-main-wrap brief-wrap">
                  <div class="logo-design-area">
                    <div class="row m-0 justify-content-between">
                      <div class="col-lg-12 p-0">
                        <div
                          class="logo-design-img-area d-flex align-items-center"
                        >
                          <h4 class="view-order-sub-hd brief-hd m-0">
                              Discussion
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
               

                  
                    <div class="logo-design-area sub-sec">
                      <div class="row m-0">
                        <div class="col-lg-12 p-0">
      <livewire:order.discussion :order="$order"/>

                        </div>
                      </div>
                    </div>
                  
                    <div class="row justify-content-center">
                      <div class="col-10">
                        <livewire:order.discussion-form :order="$order"/>      
                        @push('script')
                            <script type="text/javascript" src="/plugins/trix/trix.js"></script>
                            <script type="text/javascript" src="/plugins/trix/attachments.js"></script>
                            <script>
                                addEventListener('trix-file-accept', function(event){
                                    event.preventDefault();
                                });
                            </script>
                        @endpush
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
    </div>
  </div>
</section>

<div
  class="modal fade review-order-modal"
  id="review-modal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header pb-0">

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
      <div class="modal-body pb-0 pt-0">
        <div class="text-center justify-content-center">
          <img src="../images/review-img.png" alt="" />
          <h4 class="modal-heading">Leave a Review</h4>
          <p>
            Please, let us know about your experience<br />
            upon completing this request.
          </p>
          <form method="POST" action="{{ route('orders.store') }}">
            @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">
          <div class="rate">
            <input type="radio" id="star5" name="rating" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rating" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rating" value="3" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rating" value="2" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rating" value="1" />
            <label for="star1" title="text">1 star</label>
          </div>
        </div>
        <div class="form-group">
          <label for="message">Comment</label>
          <textarea
            class="form-control"
            id="exampleFormControlTextarea1"
            rows="9"
            name="message"
          ></textarea>
        </div>
      </div>
      <div class="modal-footer pt-0">
        <button class="btn dashboard-main-btn">Send</button>
      </div>
    </form>

    </div>
  </div>
</div>

<div
class="modal fade refunded-modal"
id="refund-modal"
tabindex="-1"
role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true"
>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header pb-0">
     
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
    <form method="POST" action="{{ route('refunds.store') }}">
      @csrf
      <input type="hidden" name="order_id" id="order_id" value="">
    <div class="modal-body pb-0 pt-0">
      <div class="text-center justify-content-center">
        <h4 class="modal-heading">Refund Why?</h4>
        <p>Share with us!</p>
      </div>
      <div class="form-group">
        <div class="mb-3">
          <label for="reason">Reason</label>
          <input
            type="text"
            class="form-control  @error('reason') is-invalid @enderror"
            id="reason" 
            name="reason"
            placeholder="Select Reason"
          />
          @error('reason')
          <div class="invalid-feedback">
              {{ $errors->first('reason') }}
          </div>  
          @enderror
        </div>
        <textarea
          class="form-control @error('message') is-invalid @enderror"
          id="exampleFormControlTextarea1"
          rows="6"
          placeholder="Message"
          id="message"
           name="message"
        ></textarea>
        @error('message')
        <div class="invalid-feedback">
            {{ $errors->first('message') }}
        </div>
        @enderror
      </div>
    </div>
    
    <div class="modal-footer pt-0">
      <button class="btn dashboard-main-btn">Send</button>
    </div>
    </form>
  </div>
</div>
</div> 

 @endsection
