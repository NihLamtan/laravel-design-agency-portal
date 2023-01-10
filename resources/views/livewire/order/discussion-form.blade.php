<div class="mb-5">
    @if($errors->count())
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form wire:submit.prevent="save">
        {{-- <input id="message" type="hidden" wire:model="message"> --}}
        <div wire:model.debounce.365ms="message" wire:ignore>
            <trix-editor class="formatted-content"
            x-ref="trix"
            wire:key="uniqueKey"></trix-editor>
        </div>
        <div class="row align-items-center">
            <div class="col-9">
                <div class="form-group mb-0">
                    <div class="mb-3">
                        @if($attachment)
                            <img src="{{ $attachment->temporaryUrl() }}" class="img-fluid" width="100">
                        @endif
                    </div>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" wire:model="attachment">
                    <label for="exampleFormControlFile1" class="add-attachment-btn">add attachment <span>up to 100mb each</span></label>
            </div>
        </div>

                    <div class="col-3  d-flex justify-content-end">
                        <div class="mt-3">
                            <button class="btn dashboard-main-btn" type="submit">Send Message</button>
                        </div>
                    </div>
               
      
</div>

    </form>
</div>
<style>
    input[type=file] {
    width: 0px;
    height: 0;
    z-index: -1;
    position: absolute;
    overflow: hidden;
    opacity: 0;
}
</style>
