
        
@extends('layouts.user-dashboard')

<link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">

@section('content')
    

<section class="brief-section">
    <div class="container">
    <form method="POST" action="{{ route('orders.brief.store', $order_id)}}" enctype="multipart/form-data" id="brief_form">
        @csrf
        <x-animation-component />


                    </div>
                    <div class="container">
                        <div class="row justify-content-center mb-5">
                            <button class="btn dashboard-main-btn">Submit</button>
                        </div>
                    </div>
               
  
    </form>

    </section>

@endsection
