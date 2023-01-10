@extends('admin-layout')


@section('table')
<div class=" mt-5">
<div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                   New Category
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('admin.service_categories.store') }}"  enctype="multipart/form-data">
        @csrf

        <div class="m-portlet__body">
          
        <div class="form-group m-form__group row">
            <label for="name" class="col-2 col-form-label">
                Name
            </label>
            <div class="col-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        
              @error('name')
              <div class="invalid-feedback">
                  {{ $errors->first('name') }}
              </div>
              @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="image" class="col-2 col-form-label">
                Image
            </label>
            <div class="col-10">
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
      
              @error('image')
              <div class="invalid-feedback">
                  {{ $errors->first('image') }}
              </div>
              @enderror
            </div>
        </div>
      
      
      
      
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                  
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>

@endsection


