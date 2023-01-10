<x-jet-form-section submit="updateProfileInformation">

    @section('table')

    <x-slot name="title">
      
    </x-slot> 
   
 
    
    <x-slot name="description">
       <h3></h3>
       </x-slot>
    

    
    <x-slot name="form">
            <h3 class="pb-4">Profile Information</h3>
       
        <div class="row ">
            <div class="col-lg-6">
            <label for="first_name">First name</label>
            <x-jet-input id="first_name"  name="first_name" type="text" class="form-control" wire:model.defer="state.first_name" autocomplete="first_name" />
            <x-jet-input-error for="first_name" class="mt-2" />
            </div>
            <div class="col-lg-6">
                <label for="last_name">Last name</label>
                <x-jet-input id="last_name" name="last_name" type="text" class="form-control" wire:model.defer="state.last_name" autocomplete="last_name" />
                <x-jet-input-error for="first_name" class="mt-2" />
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-lg-6 ">
                <label for="email">Email</label>
                <x-jet-input id="email" type="email" name="email" class="form-control" wire:model.defer="state.email" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>
            <div class="col-lg-6">
                <label for="city">City</label>

                <x-jet-input id="city" type="text" name="city" class="form-control" wire:model.defer="state.city" />
                <x-jet-input-error for="city" class="mt-2" />
            </div>  
        </div>
        <div class="row pt-4">
            <div class="col-lg-6">
                <label for="state">State</label>

                <x-jet-input id="state" type="text" name="state" class="form-control" wire:model.defer="state.state" />
                <x-jet-input-error for="state" class="mt-2" />
            </div>
            <div class="col-lg-6">
                <label for="postal_code">Postal Code</label>

                <x-jet-input id="postal_code" type="number" name="postal_code" class="form-control" wire:model.defer="state.postal_code" />
                <x-jet-input-error for="postal_code" class="mt-2" />
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-lg-6">
                <label for="address">Address</label>
                <x-jet-input id="address" type="text" name="address" class="form-control" wire:model.defer="state.address" />
                <x-jet-input-error for="address" class="mt-2" />
            </div>
           
        </div>
        <div class="row">
            <div class="col-lg-6">
                   <!-- Profile Photo -->
         @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
         <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
             <!-- Profile Photo File Input -->
             <input type="file" class="hidden"
                         wire:model="photo"
                         x-ref="photo"
                         x-on:change="
                                 photoName = $refs.photo.files[0].name;
                                 const reader = new FileReader();
                                 reader.onload = (e) => {
                                     photoPreview = e.target.result; 
                                 };
                                 reader.readAsDataURL($refs.photo.files[0]);
                         " />

             <x-jet-label for="photo" value="{{ __('Photo') }}" />

             <!-- Current Profile Photo -->
             <div class="mt-2" x-show="! photoPreview">
                 <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->first_name }}" class="rounded-full h-20 w-20 object-cover">
             </div>

             <!-- New Profile Photo Preview -->
             <div class="mt-2" x-show="photoPreview">
                 <span class="block rounded-full w-20 h-20"
                       x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                 </span>
             </div>

             <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                 {{ __('Select A New Photo') }}
             </x-jet-secondary-button>

             @if ($this->user->profile_photo_path)
                 <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                     {{ __('Remove Photo') }}
                 </x-jet-secondary-button>
             @endif

             <x-jet-input-error for="photo" class="mt-2" />
         </div>
     @endif
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col">
                <button class="btn btn-primary mt-5">Submit</button>
            </div>
        </div>
      
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="btn btn-primary" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
    @endsection

</x-jet-form-section>