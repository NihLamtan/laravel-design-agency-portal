@extends('admin-layout')



    {{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css"> --}}
    

    @section('table')  
    <div class="container">
        <form method="POST" action="{{ route('admin.orders.brief.store', $order->id) }}"  enctype="multipart/form-data">
            @csrf
            <x-web-brief-component  />
            <button class="btn btn-primary">Submit</button>
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
