@extends('layouts.user-dashboard')

@section('content')

<section class="profile-about-sec" >
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <div class="user-pf-area ">
          <div class="user-pf-wrap d-flex">
          @if(!auth()->user()->profile_photo_path)
          <img src="/images/default-avatar.png" class="img-fluid"  alt="">
          @else
          <img id="profile-img-tag"   src="/thumbnail/{{ auth()->user()->profile_photo_path }}"  alt="" >

  @endif

            <div class="user-name-area ml-4">
              <h5 class="user-name ">Arsalan / Edit Profile</h5>
              <h6 class="pf-setup-hd">Set up your Dribbble presence and hiring needs</h6>
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
</section>
<section id="edit-pf" class="user-profile">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h5 class="profile-main-hd">profile</h5>
        <div class="profile-edit-opt-wrap pofile-edit">
          <h5 class="hd-edit-pf">edit profile</h5>
          <div class="profile-edit-options">
            <nav id="pf-edit-opt-nav">
              <ul class="pf-edit-opt-list m-0 list-unstyled">
                <li>
                  <a href="{{ route('account.profile') }}" class="list-item">profile</a>
                </li>
                <li>
                  <a href="{{ route('account.setting') }}" class="list-item"
                    >account setting</a
                  >
                </li>
                <li>
                  <a href="{{ route('account.password') }}" class="list-item">password</a>
                </li>
                <li>
                  <a href="{{ route('account.social_profile') }}" class="list-item"
                    >social profile</a
                  >
                </li>
                <li>
                  <a href="{{ route('account.billing') }}" class="list-item"
                    >Billing Information</a
                  >
                </li>
               
                
              </ul>
            </nav>
          </div>
        </div>
      </div>
     <div class="col-9">
      <div class="edit-pf-main-area">
       @yield('profile_content')
      </div>
     </div>
    </div>
  </div>
</section>
@endsection
