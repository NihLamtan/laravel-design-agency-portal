<div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span  wire:loading.remove>
                {{ $order->admin->name ?? '' }}
            </span>
            <span wire:loading>
                Updating...
            </span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach($admins as $id => $name)
                <button class="dropdown-item" href="javascript:;" wire:click="save({{ $id }})">{{ $name }}</button>
            @endforeach
        </div>
    </div>
</div>
