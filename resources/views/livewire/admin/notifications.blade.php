<div wire:poll.keep-alive>
    <ul class="list-group">
        @foreach (auth()->guard('admin')->user()->notifications as $notification)
        <li class="list-group-item {{ !$notification->read_at ? 'bg-secondary' : '' }}">
            <div class="media pb-2">
                <img class="mr-3" src="/images/client.jpg" alt="Generic placeholder image">
                <div class="media-body">
                    <h3 class="mt-0">{{ $notification->data['title'] }} <small class="ml-5 float-right">{{$notification->created_at->diffForHumans()}}</small></h3>
                    <p>{{ $notification->data['description']  }}</p>
                    <small>{{ $notification->created_at->format('Y-m-d h:i A') }}</small>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
