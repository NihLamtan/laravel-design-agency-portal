@extends('admin-layout')


@section('heading')
<h1 class="heading">Customer List</h1>
    
@endsection
@section('table')

<div class="card shadow mb-4">
    <div class="card-header p-0">
    
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div class="main-content-body">
            <form method="POST" action="{{ route('admin.customers.update', $user->id) }}">
                @csrf
                @method('PUT')
        
        
                <div class="form-group row">
                    <label for="first_name" class="col-sm-3 col-form-label">FIrst Name <span>*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control " id="first_name" name="first_name" value="{{ $user->first_name }}">
        
        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="last_name" class="col-sm-3 col-form-label">Price <span>*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control " id="last_name" name="last_name" value="{{ $user->last_name }}">
        
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label for="image_upload" class="col-sm-3 col-form-label">Image Upload <span>*</span></label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control " id="image_upload" name="image_upload" value="{{ $service->image_upload }}">
        
        
                    </div>
        
                </div> --}}
                <div class="form-group row">
                    <label for="country" class="col-sm-3 col-form-label">Country <span>*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="country" name="country" value="{{ $user->country  }}">
        
        
                    </div>
                </div>
        
                <div class="border-field">
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone <span>*</span></label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control " id="phone" name="phone" value="{{ $user->phone }}">
        
        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email <span>*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " id="email" name="email" value="{{ $user->email }}">
        
        
                        </div>
                    </div>
                </div>
                <button class="btn-primary">Update</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>



@endsection