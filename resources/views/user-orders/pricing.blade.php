@extends('user-backend-layout')

@section('content')

<section class="section pricing-section">
  <div class="container-fluid">
    <div class="row text-center justify-content-center">
      <div class="col-6">
        <h2 class="section-heading">
            Save Big With LogoInUsa
        </h2>
        <p class="para">
            Try us out for the first week. Discuss your ideas with our Dedicated Project Team.
            See if the process is suitable for you. Explore and Experiment with your ideas
            along with our talented professionals.       
        </p>
      </div>
    </div>
    <div class="pricing-banner">
      <div class="row">
          <div class="col-6">
              <div class="row">
                  <div class="col-6">
                      <div class="package text-center">
                          <img src="../images/icon_logo design.svg" class="img-fluid" alt="">
                          <h4 class="content-title">
                              Logo Design & Brand
                              Identity Pack
                          </h4>
                          <p class="medium-text">For most business that want
                          to optimize web queries</p>
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="package-label">
                          <img src="../images/package-label.png" alt="">
                          <span>Best Package</span>
                      </div>
                      <div class="package-list">
                          <h4 class="content-title">
                              You will get!
                          </h4>
                          <ul>
                              <li><span><img src="../images/check.png" alt=""></span>Logo</li>
                              <li><span><img src="../images/check.png" alt=""></span>Business Card</li>
                              <li><span><img src="../images/check.png" alt=""></span>Letterhead & Envelope</li>
                              <li><span><img src="../images/check.png" alt=""></span>Facebook Cover</li>
                          </ul>
                          <div class="d-flex align-items-center">
                              <p class="medium-text m-0">With</p>
                              <label for="price" class="price-label ml-2">$799</label>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-6">
              <div id="slideset6">
                  <div>
                      <img  src="../images/package-banner-1.jpg" class="img-fluid">
                  </div>
                  <div>
                      <img  src="../images/package-banner-2.jpg" class="img-fluid">
                  </div>
                  <div>
                      <img  src="../images/package-banner-3.jpg" class="img-fluid">
                  </div>
                  <div>
                      <img  src="../images/package-banner-4.jpg" class="img-fluid">
                  </div>
              </div>    
          </div>
      </div>
  </div>
  </div>
</section>

<section class="pricing-plan-section">
  <div class="container">
    <div class="row  text-center  justify-content-around">
  @foreach ($services as $service)
      <div class="col-3">    
          <div class="pricing-plan ">      
          <h3 class="pricing-plan-services-heading">{{ $service->name }}</h3>
          <img src="/images/pricing-category-icon-1.png" alt="">
          <h4 class="pricing-plan-category-heading">{{ $service->category->name }}</h4>
          <p>Make your website design with
              best designers</p>
              <div class="features  ml-3">
                  <ul>
                      <li><img src="../images/Check.png" alt="" />Logo</li>
                      <li><img src="../images/Check.png" alt="" />Business Card</li>
                      <li><img src="../images/Check.png" alt="" />Letterhead & Envelope</li>
                      <li><img src="../images/Check.png" alt="" />Facebook Cover</li>
                  </ul>
              </div>
              <div>
              <span class="services-pricing">$399</span>
            </div>
              <button class="btn btn-primary mt-3">Choose Plan</button>
      </div>
  </div>
      @endforeach



  </div>
  </div>
</section>
@endsection