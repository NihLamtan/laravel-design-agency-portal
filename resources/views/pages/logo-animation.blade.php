@extends('frontend-layout')

@section('title', 'Logo Animation')


@section('content')
<section class="inner-banner logo-animation">
  <div class="container-fluid">
      <div class="row align-items-center justify-content-center">
          <div class="col-lg-5">
              <div class="inner-banner-content">
                  <h1 class="banner-title">LOGO ANIMATION</h1>
                  <h6 class="mt-4 mb-4">Take multimedia marketing to the next level.</h6>
                  <p class="body-intro">
                      Enthrall your audience with our exclusive logo animations
                      created with a focus on enhancing visual marketing strategies.
                  </p>
                  <div class="buttons">
                      <button class="dark-btn mr-2">
                          Get Check Price
                      </button>
                      <a href="{{ route('book-a-call') }}">

                          <button class="dark-btn schedule-btn">
                              Call Schedule
                          </button>
                      </a>
                  </div>
              </div>
          </div>
          <div class="col-lg-5">
              <div>
                  <img src="../images/logo-animation-14.gif" class="img-fluid" alt="">
              </div>
          </div>
      </div>
  </div>
</section>
<section class="brand-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
              <x-brands-logo />
            </div>
        </div>
    </div>
</section>

<section class="section pricing-section">
    <div class="container-fluid">
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
        <div class="portfolio-filter all-services" data-id="All" style="display: block;">
            <div class="pricing-banner">
@if($service_bundle)
                <div class="row justify-content-end align-items-center">
                    <div class="col-lg-6 pl-0">
                        <img src="{{ $service_bundle->image_upload_path }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-3">
                        <div class="pricing-content">
                            <div class="package-label d-flex justify-content-center">
                                <img src="../images/package-label.png" class="img-fluid" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <img src="../images/logo-design-and-brand.svg" alt="">
                            </div>          
                            <h5>
                               {{ $service_bundle->name }}
                            </h5>
                                
                            <p class="medium-text">
                                Make your website design with
                                best designers
                            </p>
                            <div class="pricing">
                                <p>form</p>
                                <h6>$799</h6>
                                <div class="price">
                                    <h4>$599</h4>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="pricing-content features text-left">
                            <h3>
                                Features you will get!
                            </h3>
                            <ul>
                                @if($service_bundle->features)
                            @foreach ($service_bundle->features as $feature)
                                <li><i class="fas fa-check"></i>{{ $feature }}</li>
                            @endforeach
                            @endif
                            </ul>
                            <button type="button" class="dark-btn" data-toggle="modal" data-target="#logo-identity-pack">
                                View
                            </button>
                        </div>
                    </div>
                </div>
                @endif

            </div>  
                    <div class="row mb-lg-4 justify-content-center">
                        <div class="col-lg-10">
                                <div class="row">
                      @foreach ($service_category->services as $service)
                          
                                    <div class="col-4 pt-3">
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
                                                
                                                <button type="button"  class="dark-btn" data-toggle="modal" data-target="#{{ $service->slug }}">
                                                    View
                                                </button >
                                            </div>
                                         
                                            
                                    </div>
                        @endforeach

                                   

                                </div>
                            </div>
                        </div>

                        </div>
                     @foreach($service_category->services as $service)
                     <div class="modal fade"  id="{{ $service->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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

                                    <div class="row justify-content-end">
                                        <div class="col-lg-4">
                                            <div class="service-detail">
                                                <img src="/images/modal-icon.svg" class="img-fluid" alt="">

                                                <h2 class="section-heading" id="exampleModalLongTitle">
                                                    {{ $service->name }}
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
                                                    
                                                </ul>
                                                        <div class="pricing justify-content-start mb-4">
                                                            <p>form</p>
                                                            <h6>$799</h6>
                                                            <div class="price">
                                                                <h4>${{ $service->price  }}</h4>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('checkout', ['plan' => $service->slug]) }}"><button class="dark-btn">Buy</button></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <img src="{{ $service->image_upload_path }}" class="img-fluid" alt="">
                                        </div>  
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                     @endforeach
                     

                        
    </div>

</section>
<section class="section testimonial">
    <div class="container">
       <x-testimonials />
    </div>
</section>
<section>
    <section class="section supported-section">
        <div class="container">
         <x-design-apps />
        </div>
    </section>
</section>
<section class="section faq">
    <div class="container">
      <x-faq />
    </div>
</section>

<section class="section cta">
    <div class="container">
       <x-cta />
    </div>
</section>

{{-- <script src="/js/index.js"></script> --}}

@endsection
