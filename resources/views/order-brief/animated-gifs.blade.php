@extends('layouts.user-dashboard')


@section('content')
    

        <form method="POST" action="{{ route('orders.brief.store', $order_id) }}"  enctype="multipart/form-data">
            @csrf
        <x-animation-component />

      
        </form>
  
        @endsection
    
    
    