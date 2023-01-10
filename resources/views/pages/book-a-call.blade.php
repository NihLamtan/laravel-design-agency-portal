@extends('frontend-layout')
@section('content')
<section class="section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-6 text-center">
                <h1 class="banner-title">Discovery Call</h1>
                <p class="body-intro">
                    Lorem ipsum, dolor sit amet consectetur
                    adipisicing elit. Veniam accusamus debitis
                    neque, eligendi ipsum minima.
                </p>
            </div>
        </div>
        <div class="row align-items-center mt-5">
            <div class="col-6">
                <img src="../images/schedule.png" class="img-fluid" alt="">
            </div>
            <div class="col-6">
                <img src="../images/schedule-2.png" class="img-fluid" alt="">
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



<section class="section testimonial">
    <div class="container">
       <x-testimonials />
    </div>
</section>



<section class="section cta">
    <div class="container">
       <x-cta />
    </div>
</section>

{{-- <script src="/js/index.js"></script> --}}

@endsection
