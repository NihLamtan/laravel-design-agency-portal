@extends('admin-layout')


  
    {{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css"> --}}

@section('table')
<div class="container">
    {{-- <div id="brief-header">
        <h1 class="basic ">Video Animation Brief</h1>
    </div> --}}
    <form method="POST" action="{{ route('admin.orders.brief.store', $order->id) }}"  enctype="multipart/form-data">
        @csrf
        <x-web-brief-component  />
        <x-logo-brief-component />
    <button class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">Create</button>

    </form>
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
