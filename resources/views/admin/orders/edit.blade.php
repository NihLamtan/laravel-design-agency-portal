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
                Edit Order
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('admin.orders.update', $order->id) }}">
        @csrf
        @method('PUT')
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label for="service_id" class="col-2 col-form-label">
                    Service 
                </label>
                <div class="col-10">
                    <select class="service-options service-select  form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id">
    
                        <option value="">Select</option>
                        @foreach($services as $service_id => $service_name)
                        <option value="{{ $service_id }}" {{ $order->service_id == $service_id ? 'selected' : ' ' }}>{{ $service_name }}</option>
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
                <label for="package_id" class="col-2 col-form-label">
                   Service Package 
                </label>
                <div class="col-10">
                    
                    <select class="package-options form-control" name="package_id">
                        <option value="">Select</option>

                        @foreach($packages as $package_id => $package_name)
                        <option value="{{ $package_id }} " {{ $order->package_id == $package_id ? 'selected' : ' ' }}>{{ $package_name }}</option>
                        @endforeach
    
                    </select>
    
                  
                </div>
            </div>
          
    
          
            <div class="form-group m-form__group row">
                <label for="customer_id" class="col-2 col-form-label">
                   Customer 
                </label>
                <div class="col-10">
                    <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id">
                        @foreach($users as $user_id => $user_name)
                        <option value="{{ $user_id }}" {{ $order->customer_id == $user_id ? 'selected' : ' ' }}>{{ $user_name }}</option>
                        @endforeach
    
                    </select>
    
                    @error('customer_id')
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_id') }}
                    </div>
                    @enderror
                </div>
            </div>
          

        <div class="form-group m-form__group row">
            <label for="price" class="col-2 col-form-label">
                Price
            </label>
            <div class="col-10">
                <input type="text" class="form-control " id="price" name="price" value="{{ $order->price }}">

            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="discount" class="col-2 col-form-label">
             Discount
            </label>
            <div class="col-10">
                <input step="0.01" type="number" class="form-control" name="discount" value="{{ $order->discount }}">

            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="order_status" class="col-2 col-form-label">
                Order Status
            </label>
            <div class="col-10">
                <select class="form-control " id="order_status" name="order_status" value="{{ $order->order_status }}">
                    <option value="pending"{{ $order->order_status == 'pending' ? 'selected' : ' ' }}>Pending</option>
                    <option value="in progress" {{ $order->order_status == 'in progress' ? 'selected' : ' ' }}>In progress</option>
                    <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : ' ' }}>Completed</option>
                    <option value="refund request" {{ $order->order_status == 'refund request' ? 'selected' : ' ' }}>refund request</option>
                    <option value="refunded" {{ $order->order_status == 'refunded' ? 'selected' : ' ' }}>refunded</option>


                </select>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="payment_status" class="col-2 col-form-label">
                Payment Status
            </label>
            <div class="col-10">
                <input type="text" class="form-control " id="payment_status" name="payment_status" value="{{ $order->payment_status }}">

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