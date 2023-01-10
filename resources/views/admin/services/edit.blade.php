@extends('admin-layout')


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
                Edit Service
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label for="category_id" class="col-2 col-form-label">
                    Category Name
                </label>
                <div class="col-10">
                    <select class="form-control @error('name') is-invalid @enderror" id="name" name="category_id">
                        @foreach($serviceCategories as $serviceCategory_id => $serviceCategory_name)
                        <option value="{{ $serviceCategory_id }}">{{ $serviceCategory_name }}</option>
                        @endforeach
    
                    </select>
                </div>
            </div>
          
        <div class="form-group m-form__group row">
            <label for="name" class="col-2 col-form-label">
                Service Name
            </label>
            <div class="col-10">
                <input type="text" class="form-control " id="name" name="name" value="{{ $service->name }}">

            </div>
        </div>
         {{-- <div class="form-group m-form__group row">
            <label for="plan" class="col-2 col-form-label">
                Plan
            </label>
            <div class="col-10">
                <input type="text" class="form-control " id="plan" name="plan" value="{{ $service->plan }}">
              

            </div>
        </div> --}}
        <div class="form-group m-form__group row">
            <label for="price" class="col-2 col-form-label">
                Price
            </label>
            <div class="col-10">
                <input type="amount" class="form-control " id="price" name="price" value="{{ $service->price }}">


            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="image_upload" class="col-2 col-form-label">
                Service Image
            </label>
            <div class="col-10">
                <input type="file" class="form-control "  name="image_upload" >
                <img src="{{ $service->image_upload_path }}" class="img-fluid" width="20%" alt="">

            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="front_img" class="col-2 col-form-label">
                Front Image
            </label>
            <div class="col-10">
                <input type="file" class="form-control "  name="front_img">
                <img src="{{ $service->front_img_path }}" class="img-fluid" width="20%" alt="">

            </div>
        </div>
      
        <div class="form-group m-form__group row">
            <label for="features" class="col-2 col-form-label">
                Features
            </label>
            <div class="col-10">
                <textarea name="features" id="" cols="30" rows="10" placeholder="Enter each feature on a line" class="form-control">
                        @foreach ($service->features as $feature)
                        {{ is_array($feature) ? implode(', ', $feature) : $feature }}
                        @endforeach
                </textarea>
            </div>
        </div>
        @foreach($service->packages as $package)
        <div class="form-group m-form__group row">
            <label for="price" class="col-2 col-form-label">
                Package title
            </label>
            <div class="col-10">
                <input type="text" class="form-control"  name="packages[{{ $package->id }}][title]" value="{{ $package->title }}">
                <input type="text" class="form-control "  name="packages[{{ $package->id }}][description]" value="{{ $package->description }}">
                <input type="amount" class="form-control "  name="packages[{{ $package->id }}][amount]" value="{{ $package->amount }}">

            </div>
        </div>
        @endforeach
{{-- 
        <div class="form-group m-form__group row">
            <label for="meta_title" class="col-2 col-form-label">
                Meta Title
            </label>
            <div class="col-10">
                <input type="text" class="form-control " id="meta_title" name="meta_title" value="{{ $service->meta_title }}">

            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="meta_description" class="col-2 col-form-label">
                Meta Description
            </label>
            <div class="col-10">
        <input type="text" class="form-control " id="meta_description" name="meta_description" value="{{ $service->meta_description }}">
          
            </div>
        </div> --}}
        <div class="form-group m-form__group row">
            <label for="meta_description" class="col-2 col-form-label">
                &nbsp;
            </label>
            <div class="col-10">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="inputPopular" name="popular" {{ $service->popular ? 'checked' : '' }}>
                    <label class="form-check-label" for="inputPopular">Mark as popular</label>
                </div>
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





{{-- @extends('admin-layout')

@section('table')

<div class="container">
    <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="first_name" class="col-sm-3 col-form-label">Customer Name <span>*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control " id="first_name" name="first_name" value="{{ $order->user->first_name }}">


            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Plan <span>*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control " id="name" name="name" value="{{ $order->service->name }}">


            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-3 col-form-label">Price <span>*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control " id="price" name="price" value="{{ $order->price }}">


            </div>
        </div>
        <div class="form-group row">
            <label for="order_status" class="col-sm-3 col-form-label">Order Status <span>*</span></label>
            <div class="col-sm-9">
                <select class="form-control " id="order_status" name="order_status" value="{{ $order->order_status }}">
                    <option value="pending">Pending</option>
                    <option value="in progress">In progress</option>
                    <option value="completed">Completed</option>
                    <option value="refund request">refund request</option>
                    <option value="refunded">refunded</option>


                </select>

             
            </div>
        </div>
      
        <div class="form-group row">
            <label for="payment_status" class="col-sm-3 col-form-label">Payment_status <span>*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control " id="payment_status" name="payment_status" value="{{ $order->payment_status }}">


            </div>
        </div>
        <button class="btn btn-primary">Update</button>
        
        </div>  
    </form>
</div>
</div>
</div>
@endsection --}}

