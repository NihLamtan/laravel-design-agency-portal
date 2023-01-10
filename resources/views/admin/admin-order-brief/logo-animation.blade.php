@extends('admin-layout')

    @section('table')
        
    <div class="container">
        <form method="POST" action="{{ route('admin.orders.brief.store', $order->id) }}"  enctype="multipart/form-data">
            @csrf
        <x-animation-component />

        <div class="row">
            <div class="col">
                <button class="dark-btn">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

    
    @endsection
    
    