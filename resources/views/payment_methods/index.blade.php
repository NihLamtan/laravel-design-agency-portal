<x-app-layout>
  
    @section('title')
    <div class="row mt-3">
      <div class="col-lg-10">
        <h3 class="user-heading-style">{{ $title ?? '' }}</h3>
      </div>
      <div class="col-lg-2">
        <a href="{{ route('orders.create') }}"><button class="btn btn-primary user-theme-btn">Add New</button></a>
      </div>
    </div>
    
  @endsection
  @section('table-content')
    
  @endsection  
</x-app-layout>
