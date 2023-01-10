@extends('admin-layout')

    @section('table')
        <form method="POST" action="{{ route('admin.orders.brief.store', $order->id) }}"  enctype="multipart/form-data">
            @csrf
            <x-animation-component />
            <div class="container">
                <div class="row">   
                    <div class="col-12">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            
        </form>  
 @endsection
    
    