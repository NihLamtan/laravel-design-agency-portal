  <link rel="stylesheet" type="text/css" href="/plugins/trix/trix.css">
<link rel="stylesheet" type="text/css" href="/plugins/trix/attachments.css">
@extends('admin-layout')

@section('table')
<div class="order-details mt-5">
  
  <div class="row">
    <div class="col-5">
      <div class="border">
        <div class="user-purchased-services">
          <div class="border-bottom d-flex justify-content-between">
            <h3 class="h3-heading mb-0">Purchased It</h3>
            <span>{{  $order->created_at->format('d-M-Y')  }}</span>
        </div>

          <div class="d-flex align-items-center pt-4">
          <img src="/images/icon-logo-design.svg" class="img-fluid mr-2" style="width:10%;" alt="icon">
            <h3 class="h3-heading mb-0">{{ $order->service->category->name }} - <span>{{ $order->service->name }}</span></h3>
          </div>

        <div class="features pt-4">
          <h4>Features</h4>

          @if($order->service && $order->service->features)

          <ul class="pt-3">
              @foreach ($order->service->features as $features)
              <li>
                  <img src="/images/Check.png" class="mr-3" alt="" />{{ $features }}
                </li>
              @endforeach
         
          </ul>
            @endif
        </div>
       </div>
    </div>
    @if($order->package)

    <div class="border mt-4">
      <div class="user-purchased-services">
        <div class="border-bottom d-flex justify-content-between">
          <h3 class="h3-heading mb-0">Package</h3>
          <span>{{  $order->created_at->format('d-M-Y')  }}</span>
      </div>

        <div class="d-flex align-items-center pt-4">
        <img src="/images/icon-logo-design.svg" class="img-fluid mr-2" style="width:10%;" alt="icon">
          <h3 class="h3-heading mb-0">{{ ucfirst($order->package->title) }}</h3>
        </div>

      <div class="features pt-4">
        <h4>Description</h4>

      <p>{{ $order->package->description }}</p>
      </div>
     </div>
  </div>
  @endif
  
      <div class="border mt-3">
        <div class="border-bottom">
          <div class="purchased-price d-flex justify-content-between align-items-center">
            <h4 class="pricing-heading mb-0">Service Price</h4>
            <span>${{ $order->service->price }}</span>
          </div>
        </div>
        <div class="border-bottom mt-3">
        <div class="purchased-price d-flex justify-content-between align-items-center">
          <h4 class="pricing-heading mb-0">Total</h4>
          <span>$100</span>
        </div>
      </div>
        <div class="purchased-price d-flex justify-content-between align-items-center pt-3 pb-3">
          <h4 class="pricing-heading mb-0">Net Price</h4>
          <span>$100</span>
      </div>
      </div>
    </div>
    <div class="col-7">
      @if($order->brief)

      <div class="border">
        <div class="border-bottom">
        <h3 class="h3-heading mb-0">Brief</h3>
      </div>
        <x-logo-order-brief :instructions="$order->brief->instructions" :order="$order"/>
          @else
          <div class="brief-message-border d-flex justify-content-between align-items-center">
            <h3 class="breif-message">This user brief not fill</h3>
            <a  href="{{ route('admin.orders.brief.index', $order->id) }}">Create Brief</a>
            </div>
      </div>
      @endif

    </div>
  </div>
</div>


@if($order->attachments->count())
<div class="order-details">
  <div class="attachment-table">
<div class="border">
  <div class="row">
    <div class="col">
      <div class="border-bottom mb-4">
      <h3 class="mb-0">Attachment</h3>
    </div>
  </div>
  </div>
<div class="row">
  <div class="col-12">
    <livewire:order.discussion-attachments :order="$order" />
  </div>
</div>
</div>
</div>

</div>
@endif

<section class="discussion-section">
    <div class="border">
      <div class="row">
        <div class="col">
          <div class="border-bottom">
            <h4 class="h4-heading">Discussion</h4>
          </div>
        </div>
      </div>
      <livewire:order.discussion :order="$order"/>
      <div class="row  mt-4">
          <div class="col-lg-12">
              <livewire:order.discussion-form :order="$order"/>      
          </div>
    </div>
  </div>
</section>

 
  
  @push('script')
              <script type="text/javascript" src="/plugins/trix/trix.js"></script>
              <script type="text/javascript" src="/plugins/trix/attachments.js"></script>
              <script>
                  addEventListener('trix-file-accept', function(event){
                      event.preventDefault();
                  });
              </script>
          @endpush      
@endsection


        
        
        




