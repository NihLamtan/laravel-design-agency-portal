@extends('admin-layout')


    @section('table')
        
    <div class="container">
        
        <form method="POST" action="{{ route('admin.orders.brief.store', $order->id) }}"  enctype="multipart/form-data">
            @csrf
        <x-animation-component />
        
        <button class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">Create</button>
    
    </form>
    </div>

    
    @endsection
    
    