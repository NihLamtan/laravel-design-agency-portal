
<div >
    <div class="container-fluid services-section">

        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="section-heading">
                    Give wings to your brand and create an amazing
                    online presence with our niche- based services.
                </h2>
                <p class="section-intro">
                    Founders, Startups, Agencies, Developers, and
                    Freelancers; we’ve got you covered. There’s
                    no limit to what you can get at LogoInUSA.
                    Our services make sure you always hit
                    the mark with your branding.
                </p>
            </div>
        </div>



        <div class="row justify-content-center align-items-center">
            <div class="col-1 d-flex justify-content-center">
                <button class="tab-btn previous-tab">
                    <i class="fas fa-arrow-left"></i>
                </button>
            </div>
            <div class="col-8">
                <div class="tabs" wire:ignore>
                    <ul class="tabs-slider">
                    
                        @foreach ($categories as $category)
                        <li class="portfolio-tab   {{ $active_category == $category->id ? 'active' : '' }}"><a   wire:click="changeServices({{ $category->id }})">{{ $category->name  }}</a>
                        <!-- <div wire:loading wire:target="changeServices">
                            <i class="fa fa-spinner fa-spin"></i>
                            </div> -->
                        </li>

                @endforeach
                    
                    </ul>
                </div>
            </div>
            <div class="col-1 d-flex justify-content-center">
                <button class="tab-btn next-tab">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
      
        <div class="loading" wire:loading>
<i class="fa fa-spinner fa-spin"></i>
</div>

        <div class="portfolio-filter all-services" data-id="All" style="display: block;">
            <div class="pricing-banner">
                @if($services_bundle)

                <div class="row justify-content-end align-items-center">
                    <div class="col-lg-6 pl-0">
                        <img src="{{ $services_bundle->image_upload_path }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="pricing-content">
                            <div class="package-label d-flex justify-content-center">
                                <img src="../images/package-label.png" class="img-fluid" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <img src="../images/logo-design-and-brand.svg" alt="">
                            </div>          
                            <h5>
                               {{ $services_bundle->name }}
                            </h5>
                                
                            <p class="medium-text">
                                Make your website design with
                                best designers
                            </p>
                            <div class="pricing">
                                <p>form</p>
                                <h6>$799</h6>
                                <div class="price">
                                    <h4>${{ $services_bundle->price }}</h4>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="pricing-content features text-left">
                            <h3>
                                Features you will get!
                            </h3>
                            <ul>
                                @if($services_bundle->features)
                            @foreach ($services_bundle->features as $feature)
                                <li><i class="fas fa-check"></i>{{ $feature }}</li>
                            @endforeach
                            @endif
                            </ul>
                            <button type="button" class="dark-btn" data-toggle="modal" wire:click="modalServiceId({{ $services_bundle->id }})">
                                View
                            </button>
                        </div>
                    </div>
                </div>
                @endif                          

            </div>  
                    <div class="row mb-lg-4 justify-content-center"  >
                        <div class="col-lg-10">
                                <div class="row">
                      @foreach ($services as $service)
                          
                                    <div class="col-12 col-lg-4 col-md-6 pt-3">
                                            <div class="pricing-box">
                                                <div class="package-label mb-3">
                                                    <img src="../images/package-label-8.png" class="img-fluid" alt="">
                                                </div>
                                                <img src="../images/logo-design-and-brand.svg" alt="">
                                                <h5>{{ $service->name }}</h5>

                                                <p class="medium-text">Make your website design with
                                                    best designers</p>
                                                <ul>
                                             
                                                    @if($service->features)
                                                    @foreach ($service->features as $feature)
                                                    <li><i class="fas fa-check"></i>{{ $feature  ?? ''}}</li>                   
                                                    @endforeach
                                                    @endif


                                                </ul>
                                                <div class="pricing">
                                                    <p>form</p>
                                                    <h6>$799</h6>
                                                    <div class="price">
                                                        <h4>${{ $service->price }}</h4>
                                                    </div>
                                                </div>
                                                
                                                <a href="javascript:;"  class="dark-btn" wire:click="modalServiceId({{ $service->id }})">
                                                    View
                                                </a>
                                            </div>
                                         
                                            
                                    </div>
                                   
                        @endforeach

                                </div>
                            </div>
                        </div>

                        </div>
                     
                        <div class="modal fade"  id="serviceCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button class="dark-btn close-btn" type="button" data-dismiss="modal" aria-label="Close">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>         
                                        @if($targetted_service)

                                        <div class="row justify-content-end">
                                            <div class="col-lg-4">
                                                <div class="service-detail">
                                                    <img src="/images/modal-icon.svg" class="img-fluid" alt="">

                                                    <h2 class="section-heading" id="exampleModalLongTitle">
                                                        {{ $targetted_service->name }}
                                                    </h2>
                                                    
                                                    <p class="medium-text">
                                                        Founders, Startups, Agencies, Developers, and <br>
                                                        Freelancers; we’ve got you covered. There’s no limit <br>
                                                        to what you can get at LogoInUSA. Our services <br>
                                                        make sure you always hit the mark with your <br>
                                                        branding.
                                                    </p>
                                                    <p class="medium-text">
                                                        Founders, Startups, Agencies, Developers, and <br>
                                                        Freelancers; we’ve got you covered. There’s no limit <br>
                                                        to what you can get at LogoInUSA. Our services <br>
                                                        make sure you always hit the mark with your <br>
                                                        branding.
                                                    </p>
                                                </div>
                                                <div>
                                                    <h3>
                                                        Features you will get!
                                                    </h3>
                                                    <ul>
                                                      
                                                        @if($targetted_service->features)
                                                        @foreach ($targetted_service->features as $feature)
                                                       
                                                            <li><i class="fas fa-check"></i>{{ is_array($feature) ? implode(', ', $feature) : $feature }}</li>
                                                        @endforeach
                                                        @endif
                                                           
                                                    </ul>
                                                            <div class="pricing justify-content-start mb-4">
                                                                <p>form</p>
                                                                <h6>$799</h6>
                                                                <div class="price">
                                                                    <h4>${{ $targetted_service->price  }}</h4>
                                                                </div>
                                                            </div>
                                                        {{-- <a href="{{ route('checkout', ['plan' => $targetted_service->slug]) }}">Checkout</a> --}}

                                                            <form method="GET" action="{{ route('checkout') }}">
                                                                <input type="hidden" name="plan" value="{{ $targetted_service->slug }}">

                                                                @foreach ($targetted_service->packages as $package)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="package" id="selected-radio-{{ $package->id }}" value="{{ $package->id }}" >
                                                                    <label class="form-check-label" for="selected-radio-{{ $package->id }}">
                                                                        {{ $package->title }}
                                                                        {{ $package->description }}

                                                                    </label>
                                                                  </div>
                                                            @endforeach
                                                            <button class="dark-btn">Buy</button>
                                                            </form>
                                                            
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <img src="{{ $targetted_service->image_upload_path }}" class="img-fluid" alt="">
                                             

                                            </div>  
                                        </div>
                                        @endif
                                    </div>
                                </div>                    
                            </div>
                        </div>
    </div>
</div>