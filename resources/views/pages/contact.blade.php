@extends('frontend-layout')

@section('title', 'Contact')


@section('content')
<section class="banner-bg-img text-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h1 class="banner-title">CONTACT US</h1>
          <p class="body-intro">
            Our global network of design professionals works hard to deliver
            you the best results. If you’d like to talk to one of our experts,
            feel free to drop us a message:
          </p>
          <p class="body-intro">We love hearing from you!</p>
          <button class="dark-btn mt-4">Get Started</button>
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
<section class="section form-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 text-center">
        <div class="form text-left">
          <div class="name-input">
            <div class="input">
              <h6>Full Name</h6>
              <input type="text" class='form-input' style="width: 100%">
            </div>
            <div class="input input-2">
              <h6>Phone Number</h6>
              <input type="text" class='form-input' style="width: 100%">
            </div>
          </div>
          <div class="input">
            <h6>Email</h6>
            <input type="email" class='form-input' style="width: 100%">
          </div>
          <div class="input">
            <h6>Your Subject</h6>
            <input type="text" class='form-input' style="width: 100%">
          </div>
          <div class="input">
            <h6>Discription</h6>
            <textarea name="text" id="" style="width: 100%" rows="7"></textarea>
          </div>
        </div>
        <button class="dark-btn">
          Send
        </button>
      </div>
      <div class="col-lg-4">
        <div class="contact-list">
          <div class="link d-flex align-items-center">
            <img src="/images/email-icon.svg" alt="">
            <p class='medium-text'><a href="">http://logoinusa-laravel.test</a></p>
          </div>
          <div class="link d-flex align-items-center">
            <img src="/images/phone-icon.svg" alt="">
            <p class='medium-text'>021-123456789</p>
          </div>
          <div class="link d-flex align-items-center">
            <img src="/images/address-icon.svg" alt="">
            <p class='medium-text'>1317 Edgewater Dr #2037
            Orlando, FL 32804</p>
          </div>
          <div class="link social-media-links">
            <ul class="d-flex justify-content-center">
              <li class='mr-3'>
                <a href="">
                  <img src="/images/facebook-icon.svg" alt="">
                </a>
              </li>
              <li class='mr-3'>
                <a href="">
                  <img src="/images/pintrest-icon.svg" alt="">
                </a>
              </li>
              <li class='mr-3'>
                <a href="">
                  <img src="/images/twitter-icon.svg" alt="">
                </a>
              </li>
              <li>
                <a href="">
                  <img src="/images/instagram-icon.svg" alt="">
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section cta">
        <div class="container">
            <div class="row">
               <x-cta />
            </div>
        </div>
</section>
@endsection