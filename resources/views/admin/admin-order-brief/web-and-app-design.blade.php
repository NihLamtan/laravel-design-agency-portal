@extends('admin-layout')


    {{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css"> --}}
    

    @section('table')  
    <div class="container">
        <form method="POST" action="{{ route('admin.orders.brief.store', $order->id) }}"  enctype="multipart/form-data">
            @csrf
            <x-web-brief-component  />
        <button class="btn btn-primary">Create</button>
        </form>
    </div>

    @endsection
