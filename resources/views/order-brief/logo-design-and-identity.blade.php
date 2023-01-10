@extends('layouts.user-dashboard')

<link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">

@section('content')
    

<section class="section brief-section">
    <div class="container">
    <form method="POST" action="{{ route('orders.brief.store', $order_id)}}" enctype="multipart/form-data" id="brief_form">
        @csrf
                    <x-web-brief-component  />
                    <div class="pt-4">
                    <x-logo-brief-component />

                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <button class="btn dashboard-main-btn">Submit</button>
                        </div>
                    </div>
               
  
    </form>
    </div>

    </section>

@endsection
