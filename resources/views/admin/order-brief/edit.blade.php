@extends('admin-layout')
    <link rel="stylesheet" href="/admin/css/brief.css"> 

@section('table')
<div class="container">
    <div class="row mt-5 justify-content-center">
      <div class="col-xl-12">
        <div class="m-portlet m-portlet--mobile p-4 ">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('admin.orders.brief.update', $order->id)}}" enctype="multipart/form-data" id="brief_form">
                        @csrf
                        @method('PUT')
                        <div class="section web-brief">
                            <x-admin.order-brief :order="$order"  />
                        </div>
                        </form>
                </div>
            </div>
    </div>
   
      </div>
    </div>
    
</div>
  
</div>    
</div>    

</div>    


@endsection