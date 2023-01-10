@extends('account.layout')

@section('title', 'Profile Settings')


@section('nav-bar')

<main id="main-sec">
    <x-user-dashboard-navbar/>
</main>

@endsection    


    @section('profile_content')
            <form method="POST" action="{{ route('account.setting.update') }}" enctype="multipart/form-data">   
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-12">
                <label for="user_name"  class="input-label">User Name</label>
                <input
                type="text"
                class="form-control input-area"
                id="input-name"
                value="{{ auth()->user()->user_name }}"
                name="user_name"
              />
                </div>
                <div class="col-12">
                <label for="email" class="input-label">Email</label>

                  <input
                  type="text"
                  class="form-control input-area"
                  id="input-name"
                  value="{{ auth()->user()->email }}"
                  name="email"
                />
                </div>
               
              </div>
              <div class="row">
                <div class="col">
                  <button
                  type="submit"
                   class="
                     btn btn-primary
                     dashboard-main-btn
                     save-pf-btn
                     rounded-pill
                   "
                   >save profile</button
                 >
                </div>
              </div>
         
            </form>

            


    @endsection
