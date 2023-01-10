@extends('frontend-layout') @section('title', 'Home') @section('content')

<section class="home-page-banner">
    <div class="container">
        <div class="row">
            <div class="home-banner-content">
                <div class="row text-center justify-content-center">
                    <div class="col-lg-2 col-md-3 col-4">
                        <img
                            src="/images/star.png"
                            alt=""
                            class="img-fluid"
                            style="width: 100px"
                        /><br />
                        <i class="">"truly amazing!"</i>
                    </div>
                    <div class="col-lg-2 col-md-3 col-4">
                        <img
                            src="/images/star.png"
                            alt=""
                            class="img-fluid"
                            style="width: 100px"
                        /><br />
                        <i>"truly amazing!"</i>
                    </div>
                    <div class="col-lg-2 col-md-3 col-4">
                        <img
                            src="/images/star.png"
                            alt=""
                            class="img-fluid"
                            style="width: 100px"
                        /><br />
                        <i>"truly amazing!"</i>
                    </div>
                </div>
                <div class="row text-center justify-content-center">
                    <div class="col-lg-8 col-12">
                        <h1 class="banner-title">
                            Get an unforgettable impression of your brand
                        </h1>
                        <h4 class="content-title">
                            Unlimited Graphic design services<img
                                class="ml-2"
                                style="width: 3%"
                                src="/images/flag.png"
                                alt=""
                            />
                        </h4>
                        <p class="body-intro">
                            Save time and money with a dedicated design team.
                        </p>
                        <button class="dark-btn mr-2">Get Started</button>
                        <button class="dark-btn schedule-btn">Try Free</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="brand-section d-lg-block d-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-brands-logo />
            </div>
        </div>
    </div>
</section>

<section class="section popular-sevices-section">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h2 class="section-heading">Popular Services</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    @foreach ($popular_services as $service)
                    <div class="col-3 pt-3">
                        <a type="button" data-toggle="modal" data-target="#id">
                            <img
                                src="{{ $service->front_img_path }}"
                                class="img-fluid"
                                alt=""
                            />
                            <h4 class="polular-services-heading mb-0">
                                {{ $service->name }}
                            </h4>
                        </a>
                    </div>
                    <div
                        class="modal fade"
                        id="id"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="exampleModalScrollableTitle"
                        aria-hidden="true"
                    >
                        <div
                            class="modal-dialog modal-dialog-scrollable"
                            role="document"
                        >
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div
                                            class="col-12 d-flex justify-content-end"
                                        >
                                            <button
                                                class="dark-btn close-btn"
                                                type="button"
                                                data-dismiss="modal"
                                                aria-label="Close"
                                            >
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-lg-4">
                                            <div class="service-detail">
                                                <img
                                                    src="/images/modal-icon.svg"
                                                    class="img-fluid"
                                                    alt=""
                                                />

                                                <h2
                                                    class="section-heading"
                                                    id="exampleModalLongTitle"
                                                >
                                                    {{ $service->name }}
                                                </h2>

                                                <p class="medium-text">
                                                    Founders, Startups,
                                                    Agencies, Developers, and
                                                    <br />
                                                    Freelancers; we’ve got you
                                                    covered. There’s no limit
                                                    <br />
                                                    to what you can get at
                                                    LogoInUSA. Our services
                                                    <br />
                                                    make sure you always hit the
                                                    mark with your <br />
                                                    branding.
                                                </p>
                                                <p class="medium-text">
                                                    Founders, Startups,
                                                    Agencies, Developers, and
                                                    <br />
                                                    Freelancers; we’ve got you
                                                    covered. There’s no limit
                                                    <br />
                                                    to what you can get at
                                                    LogoInUSA. Our services
                                                    <br />
                                                    make sure you always hit the
                                                    mark with your <br />
                                                    branding.
                                                </p>
                                            </div>
                                            <div>
                                                <h3>Features you will get!</h3>
                                                <ul>
                                                    @if($service->features)
                                                    @foreach ($service->features
                                                    as $feature)
                                                    <li>
                                                        <i
                                                            class="fas fa-check"
                                                        ></i
                                                        >{{ $feature }}
                                                    </li>
                                                    @endforeach @endif
                                                </ul>
                                                <div
                                                    class="pricing justify-content-start mb-4"
                                                >
                                                    <p>form</p>
                                                    <h6>$799</h6>
                                                    <div class="price">
                                                        <h4>
                                                            ${{ $service->price  }}
                                                        </h4>
                                                    </div>
                                                </div>
                                                <a
                                                    href="{{ route('checkout', ['plan' => $service->slug]) }}"
                                                    ><button class="dark-btn">
                                                        Buy
                                                    </button></a
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <img
                                                src="{{ $service->image_upload_path }}"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section how-logoinusa-works">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-lg-8 col-12 col-md-10">
                <h2 class="section-heading">
                    Standing out from the crowd isn’t easy, which is why we’re
                    here to make it simple for you.
                </h2>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-3 col-12 col-md-6">
                <div class="how-works-content">
                    <img src="/images/how-it-works-1.png" alt="" />
                    <h6>Buy Service</h6>
                    <p class="medium-text">
                        Request a design, day or night, via Trello or Slack.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-12 col-md-6">
                <div class="how-works-content">
                    <img src="/images/how-it-works-2.png" alt="" />
                    <h6>Fill our brief form</h6>
                    <p class="medium-text">
                        Receive your design within a few business days on
                        average, Monday to Friday.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-12 col-md-6">
                <div class="how-works-content">
                    <img src="/images/how-it-works-3.png" alt="" />
                    <h6>Request Design</h6>
                    <p class="medium-text">
                        We'll revise the design until you're 100% satisfied.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-12 col-md-6">
                <div class="how-works-content">
                    <img src="/images/how-it-works-2.png" alt="" />
                    <h6>Download file</h6>
                    <p class="medium-text">
                        Receive your design within a few business days on
                        average, Monday to Friday.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button class="dark-btn">How it works</button>
                <button class="dark-btn schedule-btn">Get Started</button>
            </div>
        </div>
    </div>
</section>
<section class="section testimonial-section" id="slider">
    <div class="container-fluid p-0">
        <div class="row m-0 d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="slider_content">
                    <div class="slider-items slider-item-1">
                        <div class="testimonial-slider">
                            <div class="row justify-content-center">
                                <div
                                    class="col-12 col-lg-5 d-flex justify-content-end"
                                >
                                    <div
                                        class="testimonial-image d-none d-lg-block"
                                    >
                                        <div>
                                            <img
                                                src="/images/client-img-1.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <img
                                                src="/images/client-img-2.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-lg-5 col-md-9 d-flex align-items-center"
                                >
                                    <div class="testimonial-content">
                                        <h3>
                                            <span>"</span>
                                            LogoInUSA is a platform with a good
                                            name and a very good service…
                                        </h3>
                                        <p class="medium-text">
                                            Where entrepreneurs can easily find
                                            the right design for their company.
                                            The book cover for us was a very
                                            important part of the success of the
                                            book. Therefore, we entrusted this
                                            to experts and ended up being very
                                            happy with the result."
                                        </p>
                                        <div class="client">
                                            <div class="client-image">
                                                <img
                                                    src="/images/client.jpg"
                                                    style="width: 75px"
                                                    class="img-fluid"
                                                    alt=""
                                                />
                                            </div>
                                            <div>
                                                <h5>
                                                    Val Racheeva + Maxi Knust
                                                </h5>
                                                <p>Co-authors, Germany</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-8 col-md-10 d-block d-lg-none mt-4"
                                >
                                    <div class="testimonial-image">
                                        <div class="d-md-none">
                                            <img
                                                src="/images/testimonial-bg-1.png"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-1.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-2.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-items slider-item-2">
                        <div class="testimonial-slider">
                            <div class="row justify-content-center">
                                <div
                                    class="col-lg-5 d-flex justify-content-end"
                                >
                                    <div
                                        class="testimonial-image d-none d-lg-block"
                                    >
                                        <div>
                                            <img
                                                src="/images/client-img-3.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <img
                                                src="/images/client-img-4.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-lg-5 col-md-9 d-flex align-items-center"
                                >
                                    <div class="testimonial-content">
                                        <h3>
                                            <span>"</span>
                                            LogoInUSA is a platform with a good
                                            name and a very good service…
                                        </h3>
                                        <p class="medium-text">
                                            Where entrepreneurs can easily find
                                            the right design for their company.
                                            The book cover for us was a very
                                            important part of the success of the
                                            book. Therefore, we entrusted this
                                            to experts and ended up being very
                                            happy with the result."
                                        </p>
                                        <div class="client">
                                            <div class="client-image">
                                                <img
                                                    src="/images/client-2.jpg"
                                                    style="width: 75px"
                                                    class="img-fluid"
                                                    alt=""
                                                />
                                            </div>
                                            <div>
                                                <h5>
                                                    Val Racheeva + Maxi Knust
                                                </h5>
                                                <p>Co-authors, Germany</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-8 col-md-10 d-block d-lg-none mt-4"
                                >
                                    <div class="testimonial-image">
                                        <div
                                            class="d-flex justify-content-center d-md-none"
                                        >
                                            <img
                                                src="/images/testimonial-bg-2.jpg"
                                                class="img-fluid mt-2"
                                                style="width: 80%"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-3.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-4.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-items slider-item-3">
                        <div class="testimonial-slider">
                            <div class="row justify-content-center">
                                <div
                                    class="col-lg-5 d-flex justify-content-end"
                                >
                                    <div
                                        class="testimonial-image d-none d-lg-block"
                                    >
                                        <div>
                                            <img
                                                src="/images/client-img-5.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <img
                                                src="/images/client-img-6.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-lg-5 col-md-9 d-flex align-items-center"
                                >
                                    <div class="testimonial-content">
                                        <h3>
                                            <span>"</span>
                                            LogoInUSA is a platform with a good
                                            name and a very good service…
                                        </h3>
                                        <p class="medium-text">
                                            Where entrepreneurs can easily find
                                            the right design for their company.
                                            The book cover for us was a very
                                            important part of the success of the
                                            book. Therefore, we entrusted this
                                            to experts and ended up being very
                                            happy with the result."
                                        </p>
                                        <div class="client">
                                            <div class="client-image">
                                                <img
                                                    src="/images/client-3.jpg"
                                                    style="width: 75px"
                                                    class="img-fluid"
                                                    alt=""
                                                />
                                            </div>
                                            <div>
                                                <h5>
                                                    Val Racheeva + Maxi Knust
                                                </h5>
                                                <p>Co-authors, Germany</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-8 col-md-10 d-block d-lg-none mt-4"
                                >
                                    <div class="testimonial-image">
                                        <div class="d-md-none">
                                            <img
                                                src="/images/testimonial-bg-3.png"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-5.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-6.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-items slider-item-4">
                        <div class="testimonial-slider">
                            <div class="row justify-content-center">
                                <div
                                    class="col-lg-5 d-flex justify-content-end"
                                >
                                    <div
                                        class="testimonial-image d-none d-lg-block"
                                    >
                                        <div>
                                            <img
                                                src="/images/client-img-7.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <img
                                                src="/images/client-img-8.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-lg-5 col-md-9 d-flex align-items-center"
                                >
                                    <div class="testimonial-content">
                                        <h3>
                                            <span>"</span>
                                            LogoInUSA is a platform with a good
                                            name and a very good service…
                                        </h3>
                                        <p class="medium-text">
                                            Where entrepreneurs can easily find
                                            the right design for their company.
                                            The book cover for us was a very
                                            important part of the success of the
                                            book. Therefore, we entrusted this
                                            to experts and ended up being very
                                            happy with the result."
                                        </p>
                                        <div class="client">
                                            <div class="client-image">
                                                <img
                                                    src="/images/client-4.jpg"
                                                    style="width: 75px"
                                                    class="img-fluid"
                                                    alt=""
                                                />
                                            </div>
                                            <div>
                                                <h5>
                                                    Val Racheeva + Maxi Knust
                                                </h5>
                                                <p>Co-authors, Germany</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-8 col-md-10 d-block d-lg-none mt-4"
                                >
                                    <div class="testimonial-image">
                                        <div class="d-md-none">
                                            <img
                                                src="/images/testimonial-bg-4.png"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-7.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-8.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-items slider-item-5">
                        <div class="testimonial-slider">
                            <div class="row justify-content-center">
                                <div
                                    class="col-lg-5 d-flex justify-content-end"
                                >
                                    <div
                                        class="testimonial-image d-none d-lg-block"
                                    >
                                        <div>
                                            <img
                                                src="/images/client-img-9.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <img
                                                src="/images/client-img-10.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-lg-5 col-md-9 d-flex align-items-center"
                                >
                                    <div class="testimonial-content">
                                        <h3>
                                            <span>"</span>
                                            LogoInUSA is a platform with a good
                                            name and a very good service…
                                        </h3>
                                        <p class="medium-text">
                                            Where entrepreneurs can easily find
                                            the right design for their company.
                                            The book cover for us was a very
                                            important part of the success of the
                                            book. Therefore, we entrusted this
                                            to experts and ended up being very
                                            happy with the result."
                                        </p>
                                        <div class="client">
                                            <div class="client-image">
                                                <img
                                                    src="/images/client-5.jpg"
                                                    style="width: 75px"
                                                    class="img-fluid"
                                                    alt=""
                                                />
                                            </div>
                                            <div>
                                                <h5>
                                                    Val Racheeva + Maxi Knust
                                                </h5>
                                                <p>Co-authors, Germany</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-8 col-md-10 d-block d-lg-none mt-4"
                                >
                                    <div class="testimonial-image">
                                        <div class="d-md-none">
                                            <img
                                                src="/images/testimonial-bg-5.png"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-9.jpg"
                                                class="img-fluid"
                                                alt=""
                                            />
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img
                                                src="/images/client-img-10.jpg"
                                                class="img-fluid mt-2"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="previous d-none d-lg-block">
                <i class="fas fa-arrow-left"></i>
            </button>
            <button class="next d-none d-lg-block">
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>

<section class="section portfolio-slider-section" id="portfolio-slider">
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-12 col-md-10">
                <h3 class="section-heading">
                    Take a look at our diverse portfolio that we’ve done for our
                    clients. We help them break creative boundaries and make
                    their unique ideas stand out.
                </h3>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-1 d-flex justify-content-center">
                <button class="tab-btn previous-tab">
                    <i class="fas fa-arrow-left"></i>
                </button>
            </div>
            <div class="col-8">
                <div class="tabs">
                    <ul class="tabs-slider">
                        <li class="all portfolio-tab active">All</li>
                        <li class="portfolio-tab">Logo design & identity</li>
                        <li class="portfolio-tab">Web & app design</li>
                        <li class="portfolio-tab">Business & Advertising</li>
                        <li class="portfolio-tab">Clothings & Merchandise</li>
                        <li class="portfolio-tab">Arts & Illustration</li>
                        <li class="portfolio-tab">Packaging & Labels</li>
                        <li class="portfolio-tab">Books & Magazines</li>
                        <li class="portfolio-tab">Videos & Animation</li>
                        <li class="portfolio-tab">Animated GIFs</li>
                        <li class="portfolio-tab">Logo Animation</li>
                        <li class="portfolio-tab">App & Web Videos</li>
                        <li class="portfolio-tab">3D Modeling & Animation</li>
                        <li class="portfolio-tab">3D Product Animation</li>
                        <li class="portfolio-tab">Book Trailer</li>
                        <li class="portfolio-tab">Animated Videos For Kids</li>
                    </ul>
                </div>
            </div>
            <div class="col-1 d-flex justify-content-center">
                <button class="tab-btn next-tab">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="portfolio-filter" data-id="All" style="display: block">
            <div class="col-lg-12">
                <button class="slick-previous previous-portfolio">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div
                    class="portfolio-slider-all all-portfolio portfolio-slider-all"
                >
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-1.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-1.png"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Logo designs</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-13.png"
                        >
                            <img
                                src="/images/portfolio-gallary-3.png"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Business & Advertising</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-19.png"
                        >
                            <img
                                src="/images/portfolio-gallary-4.png"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Clothing & Merchandise</label>
                    </div>
                </div>
                <button class="slick-next-btn next-portfolio">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="portfolio-filter" data-id="Logo design & identity">
            <div class="col-12">
                <button class="slick-previous previous-logo">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div class="portfolio-slider-logo logo-design-wrap">
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-1.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-1.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">logos</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-2.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-2.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">logos</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-3.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-3.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">logos</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-4.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-4.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">logos</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-5.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-5.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">logos</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-6.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-6.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">logos</label>
                    </div>
                </div>
                <button class="slick-next-btn next-logo">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="portfolio-filter" data-id="Web & app design">
            <div class="col-12">
                <button class="slick-previous previous-website">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div
                    class="portfolio-slider-website portfolio-slider-wrap web-design-wrap"
                >
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-7.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-7.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Websites</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-8.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-8.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Websites</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-9.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-9.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Websites</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-10.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-10.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Websites</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-11.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-11.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Websites</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-12.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-12.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Websites</label>
                    </div>
                </div>
                <button class="slick-next-btn next-website">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="portfolio-filter" data-id="Business & Advertising">
            <div class="col-12">
                <button class="slick-previous previous-ad">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div
                    class="portfolio-slider-ads portfolio-slider-wrap bus-adv-wrap"
                >
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-13.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-13.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Ads</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-14.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-14.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Ads</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-15.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-15.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Ads</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-16.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-16.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Ads</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-17.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-17.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Ads</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-18.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-18.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Ads</label>
                    </div>
                </div>
                <button class="slick-next-btn next-ad">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="portfolio-filter" data-id="Clothings & Merchandise">
            <div class="col-12">
                <button class="slick-previous previous-tshirt">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div
                    class="portfolio-slider-tshirts portfolio-slider-wrap clothing-wrap"
                >
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-19.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-19.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Clothing</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-20.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-20.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Clothing</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-21.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-21.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Clothing</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-22.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-22.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Clothing</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-23.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-23.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Clothing</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-24.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-24.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">T-shirts</label>
                    </div>
                </div>
                <button class="slick-next-btn next-tshirt">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="portfolio-filter" data-id="Arts & Illustration">
            <div class="col-12">
                <button class="slick-previous previous-brand">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div
                    class="portfolio-slider-brand portfolio-slider-wrap atrs-wrap"
                >
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-25.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-25.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Arts</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-26.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-26.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Arts</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-27.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-27.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Arts</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-28.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-28.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Arts</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-29.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-29.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Arts</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-30.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-30.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Arts</label>
                    </div>
                </div>
                <button class="slick-next-btn next-brand">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="portfolio-filter" data-id="Packaging & Labels">
            <div class="col-12">
                <button class="slick-previous previous-print">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div
                    class="portfolio-slider-print portfolio-slider-wrap packaging-wrap"
                >
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-31.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-31.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Packaging</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-32.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-32.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Packaging</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-33.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-33.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Packaging</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-49.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-49.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Packaging</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-35.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-35.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Packaging</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/portfolio-gallary-36.jpg"
                        >
                            <img
                                src="/images/portfolio-gallary-36.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Packaging</label>
                    </div>
                </div>
                <button class="slick-next-btn next-print">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="portfolio-filter" data-id="Books & Magazines">
            <div class="col-12">
                <button class="slick-previous previous-book">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div
                    class="portfolio-slider-books portfolio-slider-wrap books-wrap"
                >
                    <div class="thumb slider-item">
                        <a data-fancybox="gallery" href="./images/book-1.jpg">
                            <img
                                src="/images/book-1.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Books</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/magazine-1.jpg"
                        >
                            <img
                                src="/images/magazine-1.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Magazines</label>
                    </div>
                    <div class="thumb slider-item">
                        <a data-fancybox="gallery" href="./images/book-2.jpg">
                            <img
                                src="/images/book-2.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Books</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/magazine-2.jpg"
                        >
                            <img
                                src="/images/magazine-2.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Magazines</label>
                    </div>
                    <div class="thumb slider-item">
                        <a data-fancybox="gallery" href="./images/book-3.jpeg">
                            <img
                                src="/images/book-3.jpeg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Books</label>
                    </div>
                    <div class="thumb slider-item">
                        <a
                            data-fancybox="gallery"
                            href="./images/magazine-3.jpg"
                        >
                            <img
                                src="/images/magazine-3.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </a>
                        <label for="">Magazines</label>
                    </div>
                </div>
                <button class="slick-next-btn next-book">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <button class="dark-btn mr-2">All Portfolio</button>
                <button class="dark-btn schedule-btn">Get Started</button>
            </div>
        </div>
    </div>
</section>
<section class="section facilities-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 text-center">
                <img src="/images/calender.svg" class="icon-img" alt="" />
                <h5>Month-to-month</h5>
            </div>
            <div class="col-12 col-lg-3 text-center">
                <img src="/images/cancel-anytime.svg" alt="" />
                <h5>Cancel any time</h5>
            </div>
            <div class="col-12 col-lg-3 text-center">
                <img src="/images/best-price.svg" alt="" />
                <h5>Best price</h5>
            </div>
            <div class="col-12 col-lg-3 text-center">
                <img src="/images/money-back-guarantee.svg" alt="" />
                <h5>Money back guarantee</h5>
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
