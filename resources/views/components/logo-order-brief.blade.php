<div>
<div class="pt-3">
    @if($instructions)
@foreach ($instructions as $instruction => $value) 
     <h5 class="brief-sec-sub-hd">{{ $instruction }}</h5>
     
        @if($instruction == 'Inspiration File')
        @if(auth()->guard('admin')->check())
        <img src="{{ route('admin.attachment', ['inspiration-logos', $value]) }}" class="img-fluid">
        @else
        <img src="{{ route('orders.brief.show_image', $order->order_id) }}"  >
     @endif
        @else

            <p class="brief-sec-content">{{ is_array($value) ? implode(', ', $value) : $value }}</p>
        @endif
        

        @endforeach
        @endif
    
</div>
    
  
</div>