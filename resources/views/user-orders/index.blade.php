@extends('layouts.user-dashboard')



@section('title', 'Orders')

@section('nav-bar')

<main id="main-sec">
    <x-user-dashboard-navbar/>
</main>

@endsection  

    
@section('content')

<section id="order-sec">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <div
          class="
            order-sec-content-area
            d-flex
            justify-content-between
            align-items-center
            order-list-main-hd-area
          "
        >
          <h4 class="sec-main-hd order-sec-hd p-0">your orders</h4>

          <a
            href="{{ route('categories') }}"
            class="
              btn btn-primary
              rounded-pill
              view-all-orders-btn
              dashboard-main-btn
            "
            >New Order</a
          >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <livewire:order.orders :orders="$orders" />

      </div>
    </div>

   
  </div>
</section>


@endsection

  
 



