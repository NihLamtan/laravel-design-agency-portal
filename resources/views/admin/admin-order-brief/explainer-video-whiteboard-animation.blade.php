@extends('admin-layout')


    @section('table')

    <div class="container">

   <div class="card">
       <div class="card-body">
           <div class="row">
               <div class="col-lg-12">
                <form method="POST" action="{{ route('admin.orders.brief.store', $order->id) }}"  enctype="multipart/form-data">
                    @csrf
                    <x-animation-component />
                <button class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">Create</button>
                </form>
               </div>
           </div>
       </div>
   </div>
</div>

   
       
    </div>
</div>

    
    @endsection
    
    