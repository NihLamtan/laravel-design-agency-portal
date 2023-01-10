
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.png" rel="icon" />
<title>Invoice - </title>

<!-- Web Fonts
======================= -->
{{-- <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'> --}}

<!-- Stylesheet
======================= -->
<link rel="stylesheet" href="http://demo.harnishdesign.net/html/koice/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/invoice.css"/>
<script src="js/app.js"></script>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
  <!-- Header -->
  <header>
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
      <img id="logo" src="images/logo.png" width="132" title="Logo In Usa" alt="Logo In Usa" />
    </div>
    <div class="col-sm-5 text-center text-sm-right">
      <h4 class="text-7 mb-0">Invoice</h4>
    </div>
  </div>
  <hr>
  </header>
  
  <!-- Main Content -->
  <main>
  <div class="row">
    <div class="col-sm-6"><strong>Date:</strong> {{ $order->created_at->format('d/m/Y') }}</div>
    <div class="col-sm-6 text-sm-right"> <strong>Invoice No:</strong> {{$order->order_number}}</div>
	  
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-6 text-sm-right order-sm-1"> <strong>Pay To:</strong>
      <address>
      Logo In Usa<br />
      2705 N. Enterprise St<br />
      Orange, CA 92865<br />
	  contact@logoinusa.com
      </address>
    </div>
    <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
      <address>
      {{-- {{ $order->user->first_name }} {{ $order->user->last_name }}<br /> --}}
      {{-- {{ $order->user->billing->address }}<br /> --}}
      {{-- {{ $order->user->billing->state }}<br /> --}}
      {{-- {{$order->user->billing->country}} --}}
      </address>
    </div>
  </div>  
  <div class="card">
    {{-- <div class="card-header px-2 py-0">
      <table class="table mb-0">
        <thead>
          <tr>
            <td class="col-3 border-0"><strong>Service</strong></td>
			<td class="col-4 border-0"><strong>Description</strong></td>
            <td class="col-2 text-center border-0"><strong>Rate</strong></td>
			<td class="col-1 text-center border-0"><strong>QTY</strong></td>
            <td class="col-2 text-right border-0"><strong>Amount</strong></td>
          </tr>
        </thead>
      </table>
    </div> --}}
    <div class="card-body px-2">
      <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <td class="col-3 border-0"><strong>Service</strong></td>
                    <td class="col-4 border-0"><strong>Description</strong></td>
                    <td class="col-2 text-right border-0"><strong>Amount</strong></td>
                  </tr>
            </thead>
          <tbody>
			      <tr>
              <td>{{$order->service->category->name }}</td>
              <td class="text-1">{{$order->service->name}}</td>
              <td class="text-center">${{$order->price}}</td>
            </tr>
            <tr>
              <td colspan="2" class="bg-light-2 text-right"><strong>Sub Total:</strong></td>
              <td class="bg-light-2 text-right">${{ $order->price }}</td>
            </tr>
            <tr>
              <td colspan="2" class="bg-light-2 text-right"><strong>Discount:</strong></td>
              <td class="bg-light-2 text-right">{{ $order->discount }}</td>
            </tr>
            <tr>
              <td colspan="2" class="bg-light-2 text-right"><strong>Total:</strong></td>
              <td class="bg-light-2 text-right">${{ $order->amount }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </main>
  <!-- Footer -->
  <footer class="text-center mt-4">
  <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
  </footer>
</div>
</body>
</html>