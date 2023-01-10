@extends('admin-layout')
<style>
    img{
        width: 60px;
        border-radius: 100px;
    }
    .media{
      padding: 30px;       
    }
    .media h3{
        font-size: 18px;
        color: black;
        font-weight: 600;
    }
    p{
        font-size: 16px;
        /* color: black; */
    }
</style>
@section('table')
  <div class="container">
    <div class="row justify-content-center mt-5 mb-5">
      <div class="col-lg-12">
        <h1 class="heading">Notifications</h1>
        <livewire:admin.notifications />
      </div>
    </div>
  </div>
  @livewireStyles
  @livewireScripts
@endsection
