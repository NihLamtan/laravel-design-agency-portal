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
                   New Coupon
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('admin.coupons.store') }}">
        @csrf

        <div class="m-portlet__body">
          
        <div class="form-group m-form__group row">
            <label for="code" class="col-2 col-form-label">
                Code
            </label>
            <div class="col-10">
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
        
                @error('code')
                <div class="invalid-feedback">
                    {{ $errors->first('code') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="start_date" class="col-2 col-form-label">
                Start Date
            </label>
            <div class="col-10">
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
        
                @error('start_date')
                <div class="invalid-feedback">
                    {{ $errors->first('start_date') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="end_date" class="col-2 col-form-label">
                End Date
            </label>
            <div class="col-10">
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
        
                @error('end_date')
                <div class="invalid-feedback">
                    {{ $errors->first('end_date') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="emails" class="col-2 col-form-label">
                Emails
            </label>
            <div class="col-10">
                <textarea class="form-control @error('emails') is-invalid @enderror" id="emails" name="emails" placeholder="Enter comma separated values">{{ old('emails') }}</textarea>
        
                @error('emails')
                <div class="invalid-feedback">
                    {{ $errors->first('emails') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="type" class="col-2 col-form-label">
                Type
            </label>
            <div class="col-10">
                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                    <option value="">Select</option>
                    <option value="percent">Percent (%)</option>
                    <option value="amount">Amount ($)</option>
                </select>

                @error('type')
                <div class="invalid-feedback">
                    {{ $errors->first('type') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="amount" class="col-2 col-form-label">
                Discount Amount
            </label>
            <div class="col-10">
                <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}">
        
                @error('amount')
                <div class="invalid-feedback">
                    {{ $errors->first('amount') }}
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