@extends('admin-layout')


@section('table')
<div class="row mt-5">
  <div class="col-xl-12">
    <div class="m-portlet m-portlet--mobile ">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              Orders
            </h3>
          </div>
          
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
            <a href="{{ route('admin.orders.create') }}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
                <span>
                  <i class="la la-plus"></i>
                  <span>
                    New Order
                  </span>
                </span>
              </a>
            </li>
        
          </ul>
        </div>
      </div>
      <div class="m-portlet__body">
        <table class="table m-table ">
          <thead>
            <tr>
              @if(super_admin())
                <th>Admin</th>
              @endif
              <th>Customer Name</th>
              <th>Plan</th>
              <th>Price</th>
              <th>Order Status</th>
              <th>Payment Status</th>
              <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)   
            <tr>
              @if(super_admin())
                <th>
                  <livewire:admin.order.assign-admin :order="$order" />
                </th>
              @endif
              <td>{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
              <td>{{ $order->service->category->name }} - {{ $order->service->name }}</td>
              <td>${{ $order->price }}</td>     
              <td class="order-status order-{{str_replace(' ', '-', $order->order_status) }}"><span>{{ $order->order_status }}</span></td>
              <td class="payment-status payment-{{str_replace(' ', '-', $order->payment_status) }}">
                <span>{{ $order->payment_status }}</span>
              </td>
              <td>                    <div class="dropdown">
                <a  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bars"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('admin.orders.show', $order->id) }}">order view</a>
                  <a class="dropdown-item" href="{{ route('admin.orders.edit', $order->id) }}">Edit</a>
                  <a class="dropdown-item" href="{{ route('admin.orders.brief.index', $order->id) }}">Create Brief</a>
                  <a class="dropdown-item" href="{{ route('admin.orders.brief.edit', $order->id) }}">edit Brief</a>
                  <a class="dropdown-item" href="{{ route('admin.orders.discussion', $order->order_id) }}">Discussion</a>

                </div>
              </div>
            </td>
            </tr>
    @endforeach
    </tbody>
  </table>
              
      </div>
    </div>
    <div class="justify-content-center d-flex">
      {{ $orders->links() }} 
    </div>
  </div>
  
</div>
@endsection




        
        
        




