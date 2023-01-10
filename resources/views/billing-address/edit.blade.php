<x-app-layout>

    @section('title')
    <div class="row mt-3">
      <div class="col-lg-10">
        <h3 class="user-heading-style">Billing</h3>
      </div>
      <div class="col-lg-2">
        <a href="{{ route('orders.create') }}"><button class="btn btn-primary user-theme-btn">New Order</button></a>
      </div>
    </div>
    
  @endsection


    <div class="row">
        <div class="col-lg-12">
            <div class="billing order-detail-block pt-0">
            <form method="POST" action="{{ route('user.billing.update') }}">
              @csrf
              @method('PUT')

                <div class="row order-block-header">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="city">

                                @error('city')
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                                @enderror
                              </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" placeholder="state" name="state">

                            @error('state')
                            <div class="invalid-feedback">
                                {{ $errors->first('state') }}
                            </div>
                            @enderror
                          </div>
                    </div>
                </div>
                <div class="row order-block-header">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="number" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" placeholder="postal code">

                                
                            @error('postal_code')
                            <div class="invalid-feedback">
                                {{ $errors->first('postal_code') }}
                            </div>
                            @enderror
                              </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="address">
                         
                          
                            @error('state')
                            <div class="invalid-feedback">
                                {{ $errors->first('state') }}
                            </div>
                            @enderror
                          </div>
                    </div>
                </div>

                <button class="btn btn-primary">Create</button>
            </form>

              
            
        </div>
    </div>
  </div>
</x-app-layout>