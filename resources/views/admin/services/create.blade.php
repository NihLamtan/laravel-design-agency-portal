@extends('admin-layout')


@section('table')
<div class="mt-5">
<div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                   New Service
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('admin.services.store') }}"  enctype="multipart/form-data">
        @csrf

        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label for="name" class="col-2 col-form-label">
                    Category
                </label>
                <div class="col-10">
                    <select class="form-control @error('name') is-invalid @enderror" id="name" name="category_id">
                        @foreach($serviceCategories as $serviceCategory_id => $serviceCategory_name)
                        <option value="{{ $serviceCategory_id }}">{{ $serviceCategory_name }}</option>
                        @endforeach
    
                    </select>
    
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                    @enderror
                </div>
            </div>
          
        <div class="form-group m-form__group row">
            <label for="name" class="col-2 col-form-label">
                Service Name
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
        {{-- <div class="form-group m-form__group row">
            <label for="plan" class="col-2 col-form-label">
                Plan
            </label>
            <div class="col-10">
                <input type="text" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" value="{{ old('plan') }}">
        
                @error('plan')
                <div class="invalid-feedback">
                    {{ $errors->first('plan') }}
                </div>
                @enderror
            </div>
        </div> --}}
        <div class="form-group m-form__group row">
            <label for="features" class="col-2 col-form-label">
                Features
            </label>
            <div class="col-10">
                <textarea name="features" id="" cols="30" rows="10" placeholder="Enter each feature on a line" class="form-control">{{ old('features') }}</textarea>
        
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $errors->first('features') }}
                        </div>
                        @enderror
            </div>
        </div>
       
        <div class="form-group m-form__group row">
            <label for="price" class="col-2 col-form-label">
                Price
            </label>
            <div class="col-10">
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
        
                @error('price')
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>
                @enderror
            </div>
        </div>
     
        <div class="form-group m-form__group row">
            <label for="image_upload" class="col-2 col-form-label">
                Service Image
            </label>
            <div class="col-10">
                <input type="file" class="form-control @error('image_upload') is-invalid @enderror"  name="image_upload" >
        
                @error('image_upload')
                <div class="invalid-feedback">
                    {{ $errors->first('image_upload') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="image_upload" class="col-2 col-form-label">
                Front Image
            </label>
            <div class="col-10">
                <input type="file" class="form-control @error('front_img') is-invalid @enderror"  name="front_img" >
        
                @error('front_img')
                <div class="invalid-feedback">
                    {{ $errors->first('front_img') }}
                </div>
                @enderror
            </div>
        </div>
        {{-- <div class="form-group m-form__group row">
            <label for="description" class="col-2 col-form-label">
                Description
            </label>
            <div class="col-10">
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
        
                @error('description')
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
                @enderror
            </div>
        </div> --}}
        {{-- <div class="form-group m-form__group row">
            <label for="meta_title" class="col-2 col-form-label">
                Meta Title
            </label>
            <div class="col-10">
                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
        
                @error('meta_title')
                <div class="invalid-feedback">
                    {{ $errors->first('meta_title') }}
                </div>
                @enderror
            </div>
        </div> --}}
        <div class="form-group m-form__group row">
            <label for="description" class="col-2 col-form-label">
                 Description
            </label>
            <div class="col-10">
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description">
        
                @error('description')
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="meta_description" class="col-2 col-form-label">
                &nbsp;
            </label>
            <div class="col-10">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="inputPopular" name="popular">
                    <label class="form-check-label" for="inputPopular">Mark as popular</label>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-8 offset-2">
        <h3 class="pt-3 pb-4">Add Packages</h3>
            </div>
            <div class="col-2">
                <span class="add"><i class="fas fa-plus"></i></span>
            </div>
        </div>
            
    
<div class="optionBox">
   

        {{-- <div class="form-group m-form__group row">
            <label for="description" class="col-2 col-form-label">
                Title
            </label>
            <div class="col-10">
                <input type="text" class="form-control"  name="title" >
        
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="description" class="col-2 col-form-label">
                Description
            </label>
            <div class="col-10">
                <input type="text" class="form-control"  name="description" value="{{ old('description') }}">
        
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="description" class="col-2 col-form-label">
                Amount
            </label>
            <div class="col-10">
                <input type="amount" class="form-control" name="amount" value="{{ old('amount') }}">
        
            </div>
        </div> --}}
        
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