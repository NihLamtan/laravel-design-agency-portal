
@extends('admin-layout')
<style>
  .order-refundrequest{
    background: red;
    color: white;
  }
   .order-refunded{
    background: green;
    color: white
    }
</style>
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
              <th>Status</th>
            </tr>
        </thead>
        <tbody>
         
          @foreach ($refunds as $refund)
          <tr>
          <td>{{ $refund->user->first_name }} {{ $refund->user->last_name }} </td>
          <td> <a href="{{ route('admin.orders.show', $refund->order->id) }}">{{ $refund->order->order_number }}</a></td>
          <td>{{ $refund->reason }}</td>
          <td>{{ $refund->message }}</td>
          <td>
            @if($refund->order->order_status == 'refund requested' && $refund->order->payment_status == 'succeeded')
            <form method="POST" action="{{ route('admin.refunds.update', $refund->id) }}">
              @csrf
              @method('PUT')
              <button type="submit" class="btn order-{{str_replace(' ', '', $refund->order->order_status) }}">approve</button>
            </form>
            @else
            {{ $refund->order->order_status }}
            @endif
          </td>
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




