@extends('account.layout')

@section('title', 'Profile Settings')

@section('nav-bar')

<main id="main-sec">
    <x-user-dashboard-navbar/>
</main>

@endsection    

    @section('profile_content')
            <form method="POST" action="{{ route('account.profile.update') }}" enctype="multipart/form-data">   
              @csrf
              @method('PUT')
              <div class="user-profile-update">
              <div class="row">
                <div class="col">
                  <div class="media">
                    <div >
                    @if(!auth()->user()->profile_photo_path)
                   <img src="/images/default-avatar.png" class="img-fluid"  alt="">
                    @else
                    <img id="profile-img-tag"   src="/thumbnail/{{ auth()->user()->profile_photo_path }}"  alt="" >
                      
          @endif
                </div>
                  
                    <div class="media-body ml-4">
                    <input id="profile-img" type="file" name="profile_photo_path" >
                      <p class="img-required m-0">JPG, GIF or PNG. Max size of 800K</p>
                      <button type="submit" class="dashboard-main-btn">Update Now</button>
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                <label for="first_name"  class="input-label" >First Name</label>
                <input
                type="text"
                class="form-control input-area"
                id="input-name"
                value="{{ auth()->user()->first_name }}"
                name="first_name"
              />
                </div>
                <div class="col-6">
                <label for="last_name" class="input-label" >Last Name</label>

                  <input
                  type="text"
                  class="form-control input-area"
                  id="input-name"
                  value="{{ auth()->user()->last_name }}"
                  name="last_name"
                />
                </div>
              </div>
              <div class="edit-pf-main-area">
                <label for="bio">Bio</label>
                <textarea class="form-control" name="bio"  rows="5" =>{{ auth()->user()->bio }}</textarea>
              </div>
              <div class="online-presence-area">
                <h5 class="online-presence-hd pb-4 pt-4">Company Information</h5>
                <div class="online-presence-sep main-sep"></div>
                <label for="company_name" class="input-label" 
                  >Company Name</label
                >
                <input
                  type="text"
                  class="form-control input-area"
                  id="input-name"
                  name="company_name"
                  value="{{ auth()->user()->company_name }}"
                />
              
                <label for="company_url" class="input-label"
                  >Company url</label
                >
                <input
                  type="text"
                  class="form-control input-area"
                  id="input-name"
                  name="company_url"
                  value="{{ auth()->user()->company_url }}"
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
                  >save profile</button
                >
              </div>
            </form>

            


    @endsection
