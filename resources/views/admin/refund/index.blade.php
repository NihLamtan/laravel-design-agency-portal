@extends('admin-layout')

@section('table')
<div class="">
<div class="row mt-5">
  <div class="col-xl-12">
    <div class="m-portlet m-portlet--mobile ">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              Refunds
            </h3>
          </div>
        </div>
      
      </div>
      <div class="m-portlet__body">
        <table class="table m-table ">
          <thead>

            <tr>
              <th>Customer Name</th>
              <th>Order ID</th>

              <th>Reason</th>
              <th>Message</th>

             
          
            </tr>
        </thead>
        <tbody>
         
          @foreach ($refunds as $refund)
          <tr>
          <td>{{ $refund->user->first_name }} {{ $refund->user->last_name }} </td>
          <td> <a href="{{ route('admin.orders.show', $refund->order_id) }}">order view</a></td>
          {{-- <td>{{ $refund->service->category->name }}- {{ $refund->order->service->name }}</td> --}}
          <td>{{ $refund->reason }}</td>
          <td>{{ $refund->message }}</td>
          
          </tr>
        @endforeach
    </tbody>
  </table>
              
      </div>
    </div>
  </div>
  
</div>
</div>

    </div>
  </div>
 
@endsection
