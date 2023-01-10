<x-app-layout>

    
      @section('title')
      <div class="row mt-3">
        <div class="col-lg-10">
          <h3 class="user-heading-style">Orders</h3>
        </div>
        <div class="col-lg-2">
        <a href="{{ route('orders.create') }}"><button class="btn btn-primary user-theme-btn">New Order</button></a>
        </div>
      </div>
    @endsection
    @section('table-content')
    <div class="card-header bg-white mb-4">
      <div class="row text-center">
        <div class="col-lg-12">
          <ul class="tabs nav nav-tabs services-tabs">
            <li class="tab-link nav-item" id="design-link" data-tab="tab-1"><a href="{{ route('orders.index') }}">Open</a></li>
            <li class="tab-link current nav-item" data-tab="tab-2">
           Close
            </li>
          </ul>
         
        </div>
      
      </div>
    
     
    </div>
    <div class="card shadow order-listing mb-4">
        
        <div class="card-body close-order">
          <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Order Status</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th></th>
                  </tr>
                </thead>
             
              <tbody>
              @foreach ($orders as $order)
              <tr>
              <td class="product-name-list"><h4>{{ $order->service->category->name }} - <span>{{ $order->service->name }}</span></h4></td>
              <td class="bg"><span>{{ $order->order_status }}</span></td>
              <td class="listing-price">${{ $order->price }}</td>
              <td class="listing-date">{{ $order->created_at }}</td>
              <td>
              <div class="dropdown">
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-h"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item" href="{{ route('orders.show', $order) }}">View Order</a>
                </div>
              </div>
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
   
    @endsection  
  </x-app-layout>
  