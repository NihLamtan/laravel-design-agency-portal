
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
                   New Storage
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('admin.storage.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="m-portlet__body">
          
        <div class="form-group m-form__group row">
            <label for="file_name" class="col-2 col-form-label">
                File
            </label>
            <div class="col-10">
                <input type="file" class="form-control @error('file_name') is-invalid @enderror" id="file_name" name="file_name">
        
                @error('file_name')
                <div class="invalid-feedback">
                    {{ $errors->first('file_name') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="customer_id" class="col-2 col-form-label">
                Customer
            </label>
            <div class="col-10">
                <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id">
                    @foreach($users as $user_id => $user_name)
                    <option  value="{{ $user_id }}">{{ $user_name }}</option>
                    @endforeach

                </select>

                @error('customer_id')
                <div class="invalid-feedback">
                    {{ $errors->first('customer_id') }}
                </div>
                @enderror
            </div>
        </div>
{{--       
         <div class="form-group row">
            <label for="plan" class="col-sm-3 col-form-label">Plan<span>*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" value="{{ old('plan') }}">

                @error('plan')
                <div class="invalid-feedback">
                    {{ $errors->first('plan') }}
                </div>
                @enderror
            </div>
        </div>  --}}
      
      
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        Cancel
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


