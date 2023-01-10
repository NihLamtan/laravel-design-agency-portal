@extends('account.layout')



@section('title', 'Profile Settings')

@section('nav-bar')

    <main id="main-sec">
        <x-user-dashboard-navbar/>
    </main>

@endsection
    @section('profile_content')
            <form method="POST" action="{{ route('account.billing.update') }}">   
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-6">
                <label for="state"  class="input-label">State</label>
                <input
                type="text"
                class="form-control input-area"
                value="{{ auth()->user()->user_address->state }}"
                name="state"
              />
                </div>
                <div class="col-6">
                <label for="city" class="input-label" >City</label>

                  <input
                  type="text"
                  class="form-control input-area"
                  value="{{ auth()->user()->user_address->city }}"
                  name="city"
                />
                </div>
              </div>
              <div class="edit-pf-main-area">
                <label for="address" class="input-label" >Address</label>
                <input
                  type="text"
                  class="form-control input-area"
                  value="{{ auth()->user()->user_address->address }}"
                  name="address"
                />
                <label for="postal_code" class="input-label" >Postal Code</label>
                <input
                  type="number"
                  class="form-control input-area"
                  name="postal_code"
                  value="{{ auth()->user()->user_address->postal_code }}"
                />
               
                <button
                type="submit"
                 class="
                   btn btn-primary
                   dashboard-main-btn
                   save-pf-btn
                   rounded-pill
                   mb-5
                 "
                 >save billing</button
               >
              </div>
   
            </form>

            


    @endsection
