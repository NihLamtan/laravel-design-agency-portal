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
                   New Order
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('admin.orders.store') }}">
        @csrf
        <div class="m-portlet__body">

        <div class="form-group m-form__group row">
            <label for="category_id" class="col-2 col-form-label">
                Categories
            </label>
            <div class="col-10">
                <select class="form-control category-options @error('name') is-invalid @enderror" id="category_id" name="category_id">

                    <option  >Select</option>
                    @foreach($categories as $category_id => $category_name)
                    <option value="{{ $category_id }}">{{ $category_name }}</option>
                    @endforeach

                </select>

                @error('category_id')
                <div class="invalid-feedback">
                    {{ $errors->first('category_id') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="service_id" class="col-2 col-form-label">
                Service 
            </label>
            <div class="col-10">
                <select class="service-options service-select  form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id">

                    <option value="">Select</option>
                    {{-- @foreach($services as $service_id => $service_name)
                    <option value="{{ $service_id }}">{{ $service_name }}</option> --}}
                    
                    {{-- @endforeach --}}

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
                    {{-- @foreach($packages as $package_id => $package_name)
                    <option value="{{ $package_id }}">{{ $package_name }}</option>
                    @endforeach --}}

                </select>

              
            </div>
        </div>
      


        <div class="form-group m-form__group row">
            <label for="discount" class="col-2 col-form-label">
             Discount
            </label>
            <div class="col-10">
                <input step="0.01" type="number" class="form-control" name="discount">

            </div>
        </div>
      
        <div class="form-group m-form__group row">
            <label for="customer_id" class="col-2 col-form-label">
               Customer 
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
<script>


document.querySelector('.category-options').addEventListener('change', fetchServiceData)
    function fetchServiceData(event)
    {   
        let serviceOption = document.querySelector('.service-options')
        let optionsFragment = document.createDocumentFragment();

        // console.log(event.target.value)
        fetch('/admin/api/service_categories/'+ event. target.value + '/services' )
        .then(response => response.json())
        .then(services => {
            
            if ( services.data && services.data.length ) {
                serviceOption.innerHTML = ""
                services.data.forEach(function(service){
                    let option = document.createElement('option')
                    option.value = service.id
                    option.text = service.name
                    option.text += " - $" + service.price
                    optionsFragment.appendChild(option)
                })
                serviceOption.appendChild(optionsFragment)
            }
           
        })
    }

    document.querySelector('.service-select').addEventListener('change', fetchPackageData)
    function fetchPackageData(event)
    {   
        let packageOption = document.querySelector('.package-options')
        let optionsFragment = document.createDocumentFragment();
        fetch('/admin/api/services/'+ event.target.value + '/packages' )
        .then(response => response.json())
        .then(packages => {
            
            if ( packages.data && packages.data.length ) {
                packageOption.innerHTML = ""
                packages.data.forEach(function(package){
                    let option = document.createElement('option')
                    option.value = package.id
                    option.text = package.title
                    option.text += " - $" + package.amount 
                    optionsFragment.appendChild(option)
                })
                packageOption.appendChild(optionsFragment)
            }
           
        })
    }
</script>
@endsection

