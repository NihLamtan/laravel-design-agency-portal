{{-- @extends('admin-layout')


@section('table')
<div class="container mt-5">
<div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                   New Order
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('admin.login.store') }}">
        @csrf

        <div class="m-portlet__body">
        <div class="form-group m-form__group row">
            <label for="price" class="col-2 col-form-label">
                Name
            </label>
            <div class="col-10">
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">

                @error('price')
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="service_id" class="col-2 col-form-label">
                Service ID
            </label>
            <div class="col-10">
                <select class="form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id">

                    <option value="">Select</option>
                    @foreach($services as $service_id => $service_name)
                    <option value="{{ $service_id }}">{{ $service_name }}</option>
                    @endforeach

                </select>

                @error('service_id')
                <div class="invalid-feedback">
                    {{ $errors->first('service_id') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="customer_id" class="col-2 col-form-label">
               Customer ID
            </label>
            <div class="col-10">
                <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id">
                    @foreach($users as $user_id => $user_name)
                    <option value="{{ $user_id }}">{{ $user_name }}</option>
                    @endforeach

                </select>

                @error('customer_id')
                <div class="invalid-feedback">
                    {{ $errors->first('customer_id') }}
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
 --}}
