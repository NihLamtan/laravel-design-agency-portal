@extends('layouts.user-dashboard')
@section('title', 'Notifications')
      @section('content')

      <section id="notification-sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <h4 class="sec-main-hd noti-sec-hd">recent notifications</h4>
            </div>
          </div>
        <livewire:notification  />
      </div>


        </section>
  

      

      @endsection