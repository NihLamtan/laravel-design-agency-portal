@extends('admin-layout')

@section('table')
<link rel="stylesheet" type="text/css" href="/plugins/trix/trix.css">
<link rel="stylesheet" type="text/css" href="/plugins/trix/attachments.css">

<div class="card">
    <h3 class="card-header"> Order {{$order->order_number}}</h3>
    <div class="card-body p-4">
        <div class="card">
            <h5 class="card-header">Discussion</h5>
            <div class="card-body p-4">
                <livewire:admin.order.discussion :order="$order"/>
                <livewire:admin.order.discussion-form :order="$order"/>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
{{-- @push('script') --}}
    <script type="text/javascript" src="/plugins/trix/trix.js"></script>
    <script type="text/javascript" src="/plugins/trix/attachments.js"></script>
    <script>
        addEventListener('trix-file-accept', function(event){
            event.preventDefault();
        });
    </script>
    @livewireStyles
    @livewireScripts
{{-- @endpush --}}
@endsection

 
  <!-- Small modal -->
  

