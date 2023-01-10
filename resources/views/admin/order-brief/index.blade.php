@extends('admin-layout')

    <link rel="stylesheet" href="/logo-brief-css/css/brief-page.css"> 

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
    
      @section('table')
          
      <div class="container">
          <div class="header">
          <div class="order-detail-block">
          <div id="brief-header">
              <h1 class="basic">How would you like your logo?</h1>
              {{-- <h5 class="basic">* Required</h5> --}}
          </div>
          <form method="POST" action="{{ route('admin.orders.brief.store', $order->id)}}" enctype="multipart/form-data" id="brief_form">
          @csrf
          <div class="section web-brief">
            <x-web-brief-component />
          </div>
          </form>
      </div>
          </div>
      </div>
    </div>

      @push('script')
          <script>
              var error = "{{ $errors->first('inspiration_logo_file') }}"
              if(error) {
                  notie.alert({
                      type: 'error',
                      text: error,
                      stay: true,
                      time: 3,
                      position: 'top'
                  })
              }
  
          </script>

        
      @endpush
       
      @endsection
