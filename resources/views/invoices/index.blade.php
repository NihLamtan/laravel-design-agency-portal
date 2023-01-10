@extends('layouts.user-dashboard')

@section('title', 'Invoices')

@section('nav-bar')

<main id="main-sec">
    <x-user-dashboard-navbar/>
</main>

@endsection
    
    @section('content')
    <section class="section  invoice-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <div
              class="
                order-sec-content-area
                d-flex
                justify-content-between
                align-items-center
                order-list-main-hd-area
              "
            >
              <h4 class="sec-main-hd order-sec-hd p-0">your invoices</h4>
    
             
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Payment Method</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Created</th>   
                </tr>
              </thead>
              <tbody>
                @foreach ($invoices as $invoice)
                <tr>
                <td><a href="{{ route('invoices.show', $invoice->id) }}">{{ $invoice->invoice_number }}</a></td>
                  <td>Stripe</td>
                  <td>${{ $invoice->order->amount }}</td>
                  <td>Process</td>
                  <td>{{ $invoice->created_at }}</td>
                </tr>
                @endforeach
              
              </tbody>
            </table>
      
          </div>
        </div>
      </div>
    </section>
    

@endsection