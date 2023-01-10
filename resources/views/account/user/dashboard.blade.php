@extends('layouts.user-dashboard')



@section('title', 'Dashboard')

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
          <h4 class="sec-main-hd welcome-hd">
           Welcome,{{ auth()->user()->first_name }}
          </h4>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
          <div class="user-feature-wrap d-flex align-items-center">
            <div
              class="
                feat-icon-warp feat-icon-warp-1
                d-flex
                justify-content-center
                align-items-center
              "
            >
              <img
                src="../images/total-order-icon.svg"
                alt=""
                class="user-feat-icon"
              />
            </div>
            <div class="feat-content-area">
              <h5 class="feat-hd">total orders</h5>
              <h2 class="tot-order-num feat-num">{{ $orders->count() }}</h2>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
          <div class="user-feature-wrap d-flex align-items-center">
            <div
              class="
                feat-icon-warp feat-icon-warp-2
                d-flex
                justify-content-center
                align-items-center
              "
            >
              <img
                src="../images/pending-icon.svg"
                alt=""
                class="user-feat-icon"
              />
            </div>
            <div class="feat-content-area">
              <h5 class="feat-hd">pending</h5>
              <h2 class="tot-order-num feat-num">{{ $pendings->count() }}</h2>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
          <div class="user-feature-wrap d-flex align-items-center">
            <div
              class="
                feat-icon-warp feat-icon-warp-3
                d-flex
                justify-content-center
                align-items-center
              "
            >
              <img
                src="../images/secceeded-icon.svg"
                alt=""
                class="user-feat-icon"
              />
            </div>
            <div class="feat-content-area">
              <h5 class="feat-hd">succeeded</h5>
              <h2 class="tot-order-num feat-num">{{ $completed->count() }}</h2>
            </div>
          </div>
        </div>
      </div>
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
