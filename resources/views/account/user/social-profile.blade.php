@extends('account.layout')

@section('title', 'Profile Settings')

@section('nav-bar')

<main id="main-sec">
    <x-user-dashboard-navbar/>
</main>

@endsection    

    @section('profile_content')
            <form method="POST" action="{{ route('account.social_profile.update') }}" >   
              @csrf
              @method('PUT')
          
              <div class="edit-pf-main-area">
                <label for="facebook" class="input-label">Facebook</label>
                <input
                  type="text"
                  class="form-control input-area"
                  value="{{ auth()->user()->facebook }}"
                  name="facebook"
                />
                <label for="instagram" class="input-label" >Instagram</label>
                <input
                  type="text"
                  class="form-control input-area"
                  name="instagram"
                  value="{{ auth()->user()->instagram }}"


                />
                <label for="twitter" class="input-label" >Twitter</label>
                <input
                  name="twitter"
                  type="text"
                  class="form-control input-area"
                  value="{{ auth()->user()->twitter }}"
                  


                />
                <label for="linkedin" class="input-label" >Linkedin</label>
                <input
                  name="linkedin"
                  type="text"
                  class="form-control input-area"
                  value="{{ auth()->user()->linkedin }}"

                />
              </div>
              <div class="row">
                <div class="col mb-4">
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
