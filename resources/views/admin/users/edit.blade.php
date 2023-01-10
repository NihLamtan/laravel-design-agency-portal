@extends('admin-layout')

@section('table')

@push('title')
    Create New User
@endpush
<div class="row mt-5">
  <div class="col-xl-12">
    <div class="m-portlet m-portlet--mobile ">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              Users
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
        </div>
      </div>
      <div class="m-portlet__body">
        <form action="{{route('admin.users.update', $user->id) }}" method="post">
            <div class="row">
                @csrf
                @method('PUT')
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  
</div>
@endsection
