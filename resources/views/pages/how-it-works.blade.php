  @extends('frontend-layout')
  <style>
    #scroll-tabs ul {
        display: flex;
        justify-content: center;
        text-align: center;
    }
  </style>


  @section('title', 'How it works')


  @section('content')

  <section class="banner-bg-img how-it-works-banner">
    <div class="container">

    <div class="row text-sm-center justify-content-sm-center">
      <div class="col-lg-8 col-12">
      <div class="inner-banner-content">
        <h1 class="inner-banner-heading">How <span>LogoInUSA </span>Works?</h1>
        <p class="inner-banner-para">With our service packages made for businesses of all<br>
          sizes, we are the strategic partner you need to<br>
          expand your business network.</p>
          <button class="dark-btn schedule-btn ml-0">Check Price</button>
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
  <section class="section how-it-works-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-12 col-md-8">

          <div id="scroll-tabs" class="how-it-works-tabs">
            <ul class="d-flex justify-content-around">
              <li><a class="active" href="#buy-services">Buy services</a></li>
              <li><a href="#fill-out-brief">Fill form</a></li>
              <li><a href="#request">Request</a></li>
              <li><a href="#download">Download</a></li>
            </ul>
          </div>
      </div>
      <div class="row align-items-center" id="buy-services">
        <div class="col-12 d-flex justify-content-center text-center d-lg-none d-block">
          <div class="how-it-works-content">
          <img src="/images/how-it-works-img1.png" class="img-fluid" alt="">
        </div>
        </div>
        <div class="col-lg-5 col-12">
          <div class="how-it-works-content">
            <h3 class="mb-0">
              Buy service
            </h3>
            <p class="section-intro text-left mb-0 ">Start by creating a simple brief to help
              designers understand your design needs</p>
              <ul>
                <li><img src="/images/check-img-how-it-works.png" alt="">Only takes a few minutes</li>
                <li> <img src="/images/check-img-how-it-works.png" alt="">Captures your style and specs</li>
                  <li> <img src="/images/check-img-how-it-works.png" alt="">From super simple to crazy complex projects</li>
              </ul>
              <div class="collapse-box">
              <div class="d-flex justify-content-between align-items-center">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
              <div class="d-flex justify-content-between align-items-center collapse1">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
              <div class="d-flex justify-content-between align-items-center collapse1">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
                  <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                </div>
                  <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                  <div class="how-it-works-steps">
                   1
                  </div>
        </div>
        </div>
        <div class="col-7  d-none d-lg-block">
          <div class="how-it-works-content">
          <img src="/images/how-it-works-img1.png" class="img-fluid" alt="">
        </div>
        </div>
      </div>
      <div class="row align-items-center" id="fill-out-brief">
        <div class="col-lg-7 d-flex justify-content-center text-center  col-12">
          <div class="how-it-works-content">
          <img src="/images/how-it-works-img2.png"  class="img-fluid" alt="">
        </div>
        </div>
        <div class="col-lg-5 col-12">
          <div class="how-it-works-content">
            <h3 class="mb-0">
              Fill out brief form
            </h3>
            <p class="section-intro text-left mb-0 ">Start by creating a simple brief to help
              designers understand your design needs</p>
              <ul>
                <li><img src="/images/check-img-how-it-works.png" alt="">Only takes a few minutes</li>
                <li> <img src="/images/check-img-how-it-works.png" alt="">Captures your style and specs</li>
                  <li> <img src="/images/check-img-how-it-works.png" alt="">From super simple to crazy complex projects</li>
              </ul>
              <div class="collapse-box">
              <div class="d-flex justify-content-between align-items-center">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
              <div class="d-flex justify-content-between align-items-center collapse1">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
              <div class="d-flex justify-content-between align-items-center collapse1">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
                  <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                </div>
                  <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                  <div class="how-it-works-steps">
                    2
                   </div>
        </div>
        </div>
       
      </div>
      <div class="row align-items-center" id="request">
        <div class="col-12 d-flex justify-content-center text-center d-lg-none d-block">
          <div class="how-it-works-content">
          <img src="/images/how-it-works-img3.png"  class="img-fluid" alt="">
        </div>
        </div>
        <div class="col-lg-5 col-12">
          <div class="how-it-works-content">
            <h3 class="mb-0">
              Request design
            </h3>
            <p class="section-intro text-left mb-0 ">Start by creating a simple brief to help
              designers understand your design needs</p>
              <ul>
                <li><img src="/images/check-img-how-it-works.png" alt="">Only takes a few minutes</li>
                <li> <img src="/images/check-img-how-it-works.png" alt="">Captures your style and specs</li>
                  <li> <img src="/images/check-img-how-it-works.png" alt="">From super simple to crazy complex projects</li>
              </ul>
              <div class="collapse-box">
              <div class="d-flex justify-content-between align-items-center">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
              <div class="d-flex justify-content-between align-items-center collapse1">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
              <div class="d-flex justify-content-between align-items-center collapse1">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
                  <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                </div>
                  <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                  <div class="how-it-works-steps">
                    3
                   </div>
        </div>
        </div>
        <div class="col-7 d-lg-block d-none">
          <div class="how-it-works-content">
          <img src="/images/how-it-works-img3.png"  class="img-fluid" alt="">
        </div>
        </div>
      </div>
      <div class="row align-items-center" id="download">
        <div class="col-lg-7 col-12 d-flex justify-content-center">
          <div class="how-it-works-content">
          <img src="/images/how-it-works-img4.png"  class="img-fluid" alt="">
        </div>
        </div>
        <div class="col-lg-5 col-12">
          <div class="how-it-works-content">
            <h3 class="mb-0">
              Download your file
            </h3>
            <p class="section-intro text-left mb-0 ">Start by creating a simple brief to help
              designers understand your design needs</p>
              <ul>
                <li><img src="/images/check-img-how-it-works.png" alt="">Only takes a few minutes</li>
                <li> <img src="/images/check-img-how-it-works.png" alt="">Captures your style and specs</li>
                  <li> <img src="/images/check-img-how-it-works.png" alt="">From super simple to crazy complex projects</li>
              </ul>
              <div class="collapse-box">
              <div class="d-flex justify-content-between align-items-center">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
              <div class="d-flex justify-content-between align-items-center collapse1">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
              <div class="d-flex justify-content-between align-items-center collapse1">
                <span>What can I get designed?</span>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="/images/plus.png" alt=""></a>
              </div>
                  <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                </div>
                  <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                  <div class="how-it-works-steps">
                    4
                   </div>
        </div>
        </div>
       
      </div>
    </div>
  </section>
  <section class="section how-it-works-services-provide-section ">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-lg-6 col-12">
          <h2 class="section-heading">Which Services We Are Provide To You</h2>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex text-center justify-content-center">
          <div class="how-it-works-product-img">
            <ul class="how-it-works-product-tabs nav">
                <li><a data-toggle="tab" class="active show" href="#products-tab1">Single Products</a></li>
                <li><a data-toggle="tab" href="#products-tab2">Packages</a></li>
              </ul>
    </div>
        </div>
      </div>
      <div class="products-tabs tab-content">
        <div id="products-tab1" class="tab-pane fade in active show">
          <div class="row">
            <div class="col-lg-3 col-6 col-md-4">
              <div class="product-category">
                <img src="/images/single-products-img1.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Web page design</label>
              </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4">
              <div class="product-category">
              <img src="/images/single-products-img2.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Wordpress theme</label>
            </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4 mt-4 mt-lg-0 mt-md-0">
              <div class="product-category">
                <img src="/images/single-products-img3.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Landing page design</label>
              </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4 mt-4 mt-lg-0">

              <div class="product-category">
                <img src="/images/single-products-img4.png"  class="img-fluid" alt="">
                <label class="product-category-btn">App design</label>
              </div>
            </div>
            <div class="col-lg-3 pt-4 col-6 col-md-4">
              <div class="product-category">
                <img src="/images/single-products-img5.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Book Cover</label>
              </div>
            </div>
            <div class="col-lg-3 pt-4 col-6 col-md-4">
              <div class="product-category">
                <img src="/images/single-products-img6.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Product Label</label>
              </div>
            </div>
            <div class="col-lg-3 pt-4 col-6 col-md-4">
              <div class="product-category">
                <img src="/images/single-products-img7.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Product Packaging</label>
              </div>
            </div>
            <div class="col-lg-3 pt-4 col-6 col-md-4">
              <div class="product-category">
                <img src="/images/single-products-img8.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Stationary</label>
              </div>
            </div>
            <div class="col-lg-3 pt-4 col-6 col-md-4">
              <div class="product-category">
                <img src="/images/single-products-img9.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Logo Design</label>
              </div>
            </div>
            <div class="col-lg-3 pt-4 col-6 col-md-4">
              <div class="product-category">
                <img src="/images/single-products-img10.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Business Card</label>
              </div>
            </div>
            <div class="col-lg-3 pt-4 col-6 col-md-4">
              <div class="product-category">
                <img src="/images/single-products-img11.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Flyer</label>
              </div>
            </div>
            <div class="col-lg-3 pt-4 col-6 col-md-4">
              <div class="product-category">
                <img src="/images/single-products-img12.png"  class="img-fluid" alt="">
                <label class="product-category-btn">Icon</label>
              </div>
            </div> 
        </div>
      </div>
  <div id="products-tab2" class="tab-pane fade">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="product-category">
          <img src="/images/single-products-img5.png"  class="img-fluid" alt="">
          <label class="product-category-btn">Book Cover</label>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="product-category">
          <img src="/images/single-products-img7.png"  class="img-fluid" alt="">
          <label class="product-category-btn">Product Packaging</label>
        </div>
      </div>
          <div class="col-lg-3 col-6 mt-4 mt-lg-0">
            <div class="product-category">
              <img src="/images/single-products-img2.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Wordpress theme</label>
            </div>
          </div>
          <div class="col-lg-3 col-6 mt-4 mt-lg-0">
            <div class="product-category">
              <img src="/images/single-products-img3.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Landing page design</label>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="product-category">
              <img src="/images/single-products-img4.png"  class="img-fluid" alt="">
              <label class="product-category-btn">App design</label>
            </div>
          </div>
          <div class="col-lg-3 pt-4 col-6">
            <div class="product-category">
              <img src="/images/single-products-img1.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Web page design</label>
            </div>
          </div>
         
          <div class="col-lg-3 pt-4 col-6">
            <div class="product-category">
              <img src="/images/single-products-img6.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Product Label</label>
            </div>
          </div>
         
          <div class="col-lg-3 pt-4 col-6">
            <div class="product-category">
              <img src="/images/single-products-img8.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Stationary</label>
            </div>
          </div>
          <div class="col-lg-3 pt-4 col-6">
            <div class="product-category">
              <img src="/images/single-products-img9.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Logo Design</label>
            </div>
          </div>
          <div class="col-lg-3 pt-4 col-6">
            <div class="product-category">
              <img src="/images/single-products-img10.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Business Card</label>
            </div>
          </div>
          <div class="col-lg-3 pt-4 col-6">
            <div class="product-category">
              <img src="/images/single-products-img11.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Flyer</label>
            </div>
          </div>
          <div class="col-lg-3 pt-4 col-6">
            <div class="product-category">
              <img src="/images/single-products-img12.png"  class="img-fluid" alt="">
              <label class="product-category-btn">Icon</label>
            </div>
          </div> 
      </div>
    </div>
  </div>

          </div>
          <div class="row">
            <div class="col d-flex justify-content-center">
              <button class="dark-btn">More Services</button>
              <button class="dark-btn schedule-btn">Get Started</button>
            </div>
          </div>
      </div>
  </section>
  <section>
        <div class="container">
            <div class="row">
               <x-cta />
            </div>
        </div>
  </section>

  @endsection