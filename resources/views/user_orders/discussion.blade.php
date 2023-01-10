<x-app-layout>
    <link rel="stylesheet" type="text/css" href="/plugins/trix/trix.css">
    <link rel="stylesheet" type="text/css" href="/plugins/trix/attachments.css">
    @section('title')
        <div class="row mt-3">
        <div class="col-lg-10">
            <h3 class="user-heading-style">Order {{$order->order_number}} -  Discussion</h3>
        </div>
        </div>
    @endsection
    <div class="bg-light p-4">
        <livewire:order.discussion-attachments :order="$order" />
        <livewire:order.discussion :order="$order"/>
        <livewire:order.discussion-form :order="$order"/>
    </div>
    @push('script')
        <script type="text/javascript" src="/plugins/trix/trix.js"></script>
        {{-- <script type="text/javascript" src="/plugins/trix/attachments.js"></script> --}}
        <script>
            addEventListener('trix-file-accept', function(event){
                event.preventDefault();
            });
        </script>
    @endpush
</x-app-layout>
