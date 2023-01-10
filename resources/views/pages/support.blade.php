@extends('frontend-layout')

@section('title', 'Support')

@section('content')
  <section class="section project-planner-form support-page-form">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-12">
          <h1 class="banner-title text-center">Help & Support</h1>
            <form id="support_form" method="post" enctype="multipart/form-data">
              <div class="form-group row align-items-center">
                <div class="col-sm-12">
                  <label for="inputPassword" class="col-form-label">
                    Help with us <small>(required)</small>
                  </label>
                  <select
                    class="form-control required"
                    name="need_help"
                    id="need_help"
                    >
                    <option value="">What do you need help with?</option>
                    <option value="I could not submit my order">
                      I could not submit my order
                    </option>
                    <option value="How can i purchase your service?">
                      How can i purchase your service?
                    </option>
                    <option value="I'm confused about your service">
                      I'm confused about your service
                    </option>
                    <option value="I'm not receiving order confirmation email">
                      I'm not receiving order confirmation email
                    </option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <label for="inputPassword" class="col-form-label pt-4">
                    Question? <small>(required)</small>
                  </label>
                  <textarea
                    class="form-control required"
                    name="question"
                    id="question"
                    rows="3"
                  ></textarea>
                </div>
              </div>
              <div class="form-group row align-items-center">
                <div class="col-sm-12">
                  <label for="inputPassword" class="col-form-label pt-4">
                    Your Email <small>(required)</small>
                  </label>
                  <input
                    type="email"
                    class="form-control required"
                    name="customer_email"
                    id="customer_email"
                  />
                </div>
              </div>
              <div class="form-group row align-items-center">
                <div class="col-sm-12">
                  <label class="col-form-label pt-4"> Order ID </label>
                  <input
                    type="text"
                    class="form-control"
                    name="order_id"
                    id="order_id"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <label for="inputPassword" class="col-form-label pt-4">
                    File Upload
                  </label>
                  <div class="form-group form-control fil-upload">
                    <input
                      type="file"
                      class="form-control-file"
                      name="form_file"
                      id="form_file"
                    />
                  </div>
                </div>
              </div>
            <button class="dark-btn mt-3" type="submit">
              Send Request
            </button>
          </form>
          <div id="form-message"></div>

          <div class="chat-option text-center">
                <h3>OR</h3>
            <p class="medium-text">
              Need assistance to decide what you want? We’ve got your back!
              Talk to a friendly member of our team and we’ll get back to you
              shortly. : <a href="#">LIVE CHAT</a>
            </p>
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