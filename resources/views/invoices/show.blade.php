<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Seaweed+Script&display=swap"
      rel="stylesheet"
    />  
    <link rel="stylesheet" href="/frontend/css/style.css">
  </head>

  <style>
    .invoice-pf-wrap img{
      width: 46px;
    }
  </style>
  <body>

  <div class="main-body-wrap">
       <!-- nav-for-mobile -->
       <div class="mobile-nav-wrap d-block d-md-none position-fixed">
        <div class="flag-wrap">
          <img
            src="/images//usa-flag-mob.png"
            alt=""
            class="usa-flag img-fluid"
          />
        </div>
        <nav class="mobile-nav">
          <ul class="mobile-nav-list list-unstyled">
            <li>
              <img
                src="/images/dashboard-black.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="./index.html" class="mobile-nav-links"> dashboard </a>
            </li>
            <li>
              <img
                src="../images/order-black.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="./orderList.html" class="mobile-nav-links"> order </a>
            </li>
            <li>
              <img
                src="../images/Storage-black.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="./storage.html" class="mobile-nav-links"> storage </a>
            </li>
            <li>
              <img
                src="../images/invoice-black.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="./invoices.html" class="mobile-nav-links"> invoices </a>
            </li>
            <li>
              <img
                src="../images/Setting-black.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="#" class="mobile-nav-links"> setting </a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- end-nav -->

    <!-- main start -->
    <main id="main-section">
      <section class="invoice-hd-wrap">
      </section>
      <section class="invoice-info-sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="invoice-sec-wrap">
                <h5 class="invoice-info-hd">
                  invoice no :
                  <span class="invoice-info-hd-value">{{ $invoice->order->order_number }}</span>
                </h5>
                <h5 class="invoice-info-hd invoice-info-hd-2">
                  invoice Date :
                  <span class="invoice-info-hd-value">{{ $invoice->created_at->format('d/m/Y') }} </span>
                </h5>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <h6 class="invoice-info-sub-hd">from</h6>
              <div class="invoice-sub-sec-wrap">
                <div class="invoice-pf-wrap">
                  <div class="d-flex align-items-center">
                    <div class="sender-img-area">
                      <img
                        src="/images/usa-flag.png"
                        alt=""
                        class="invoice-pf img-fluid"
                      />
                    </div>
                    <h5 class="invoice-pf-name">Logo in usa</h5>
                  </div>
                </div>
                <div class="invoice-pf-content-wrap">
                  <h6 class="invoice-pf-sub-hd">email:</h6>
                  <a href="#" class="invoice-sender-email"
                    >Logoinusa@123gmail.com</a
                  >
                  <h6 class="invoice-pf-sub-hd phone-hd">phone:</h6>
                  <h6 class="invoice-sender-num">021-12345678</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <h6 class="invoice-info-sub-hd">invoice to</h6>
              <div class="invoice-sub-sec-wrap">
                <div class="invoice-pf-wrap">
                  <div class="d-flex align-items-center">
                    @if(!auth()->user()->profile_photo_path)
                    <img src="/images/invoice-user-default-avatar.png" class="img-fluid"  alt="">
                     @else
                     <img id="profile-img-tag"   src="/thumbnail/{{ auth()->user()->profile_photo_path }}"  alt="" >
                       
           @endif
                    <h5 class="invoice-pf-name">{{ ucfirst(auth()->user()->first_name) }}  {{ ucfirst(auth()->user()->last_name) }}</h5>
                  </div>
                </div>
                <div class="invoice-pf-content-wrap">
                  <div>
                    <h6 class="invoice-pf-sub-hd m-0">address:</h6>
                    @if($invoice->order)
                    <h6 class="invoice-address ml-0 pt-2">
                    {{ $invoice->order->billing_address->address }}
                    </h6>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
              <div class="order-description-wrap">
                <h5 class="invoice-about-sub-hd">order description</h5>
              </div>
              <table class="table table-responsive-sm">
                <thead>
                  <tr>
                    <th>item</th>
                    <th>Created At</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <td>{{ $invoice->order->service->name }}</td>
                  <td>{{ $invoice->order->created_at->diffForHumans() }}</td>
                  <td>${{ $invoice->order->price }}</td>

                
                </tbody>
              </table>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
              <div class="order-description-wrap p-0">
                <div class="feature-hd-wrap">
                  <h5 class="invoice-about-sub-hd">features</h5>
                </div>
                <div class="features-items-wrap">
                  <div class="row m-0 justify-content-between">
                    <div class="col-lg-3 col-md-6 col-12 p-0">
                      <div class="d-flex feature-content-area">
                        <img
                          src="../images/simple-check.svg"
                          alt=""
                          class="feature-content-check"
                        />
                        <h6 class="feature-content">Account Creation</h6>
                      </div>
                      <div class="d-flex feature-content-area">
                        <img
                          src="../images/simple-check.svg"
                          alt=""
                          class="feature-content-check"
                        />
                        <h6 class="feature-content">FBA & Logistics</h6>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 p-0">
                      <div class="d-flex feature-content-area">
                        <img
                          src="../images/simple-check.svg"
                          alt=""
                          class="feature-content-check"
                        />
                        <h6 class="feature-content">
                          Exclusive Product Research
                        </h6>
                      </div>
                      <div class="d-flex feature-content-area">
                        <img
                          src="../images/simple-check.svg"
                          alt=""
                          class="feature-content-check"
                        />
                        <h6 class="feature-content">24/7 Support</h6>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 p-0">
                      <div class="d-flex feature-content-area">
                        <img
                          src="../images/simple-check.svg"
                          alt=""
                          class="feature-content-check"
                        />
                        <h6 class="feature-content">Listing Creation</h6>
                      </div>
                      <div class="d-flex feature-content-area">
                        <img
                          src="../images/simple-check.svg"
                          alt=""
                          class="feature-content-check"
                        />
                        <h6 class="feature-content">
                          30 Days Money-Back Quarantee
                        </h6>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 p-0">
                      <div class="d-flex feature-content-area">
                        <img
                          src="../images/simple-check.svg"
                          alt=""
                          class="feature-content-check"
                        />
                        <h6 class="feature-content">Product Launch</h6>
                      </div>
                      <div class="d-flex feature-content-area">
                        <img
                          src="../images/simple-check.svg"
                          alt=""
                          class="feature-content-check"
                        />
                        <h6 class="feature-content">
                          Dedicated Account Manager
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
              <div class="order-description-wrap p-0">
                <div class="feature-hd-wrap">
                  <h5 class="invoice-about-sub-hd">features</h5>
                </div>
                <div class="features-items-wrap">
                  <div class="row m-0 justify-content-end">
                    <div class="col-lg-5 col-md-6 col-8">
                      <div class="price-area d-flex justify-content-between">
                        <h5 class="amount-prop">price:</h5>
                        <h5 class="amount-value">${{ $invoice->order->price }}</h5>
                      </div>
                      
                      <div class="calc-footer"></div>
                      {{-- <div class="price-area d-flex justify-content-between">
                        <h5 class="amount-prop">sub-total amount:</h5>
                        <h5 class="amount-value">$327</h5>
                      </div>
                      <div class="price-area d-flex justify-content-between">
                        <h5 class="amount-prop">discount:</h5>
                        <h5 class="amount-value">-10$</h5>
                      </div>
                      <div class="calc-footer"></div>
                      <div class="price-area d-flex justify-content-between">
                        <h5 class="amount-prop">total amount:</h5>
                        <h5 class="amount-value">$317</h5>
                      </div>
                      <div class="price-area d-flex justify-content-between">
                        <h5 class="amount-prop">paid:</h5>
                        <h5 class="amount-value">$317</h5>
                      </div>
                      <div class="calc-footer"></div>
                      <div class="price-area d-flex justify-content-between">
                        <h5 class="amount-prop">amount due</h5>
                        <h5 class="amount-value">$0.00</h5>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
              <div class="thankyou-wrap">
                <h1 class="thankyou-hd">thankyou</h1>
              </div>
            </div>
          </div>
          <div class="row  justify-content-center">
            <div class="col-lg-9 col-md-9 col-12">
                <div class="note-sec-wrap d-flex">
              <h6 class="note-sec-hd">note</h6>
              <p class="note-para">This is computer generated receipt and does not require physical signature.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-12">
            <div class="note-sec-wrap d-flex">
                <h6 class="note-sec-hd support-hd">support:</h6>
                <p class="note-domain text-break">@themenet.com</p>
              </div>
          </div>
        </div>
      </section>
    </main>
  </div>
    <!-- <div class="topbar invoice-topbar">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 ">
            <img src="../images/logo.png" alt="" />
          </div>
        </div>
      </div>
    </div>

    

    <section class="invoice-bg ">
      <div class="container">
        <div class="row justify-content-end">
          <div class="col-lg-4 col-8 col-md-7 text-center">
            <h3 class="invoice-heading">INVOICE</h3>
          </div>
        </div>
      </div>
    </section>

    <section class="invoice">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-12">
            <div class="address">
              <span
                >{{ $invoice->order->billing_address->address }}
              </span>
            </div>
          </div>
        </div>
        <div class="dashed">
          <div class="row">
            <div class="col-4">
              <div class="invoice-bill">
                <h4>Bill To</h4>
              </div>
            </div>
            <div class="col-4">
              <div class="invoice-bill">
                <h4>Invoice Number</h4>
              </div>
            </div>
            <div class="col-4">
              <div class="invoice-bill">
                <h4>Date</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="row p-3">
          <div class="col-4">
            <p>
                {{ $invoice->order->user->first_name }} {{ $invoice->order->user->last_name }}<br />
                {{ $invoice->order->billing_address->address }}
            </p>
          </div>
          <div class="col-4">
            <p>{{ $invoice->invoice_number }}</p>
          </div>
          <div class="col-4">
            <p>{{ $invoice->created_at->format('d/m/Y') }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th class="h5-heading" scope="col">Service No</th>
                  <th class="h5-heading" scope="col">Description</th>
                  <th class="h5-heading" scope="col">QTY</th>
                  <th class="h5-heading" scope="col">Rate</th>
                  <th class="h5-heading" scope="col">Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Asus Zenfone 3 Zoom ZE553KL Dual Sim (4GB, 64GB)</td>
                  <td>2</td>
                  <td>${{ $invoice->order->price }}</td>
                  <td>${{ $invoice->order->price }}</td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
        <div class="invoice-total">
          <div class="row justify-content-sm-end text-right">
            <div class="col-lg-3 col-12 pt-5">
              <h6>Sub-total Amount:<span>${{ $invoice->order->price }}</span></h6>
              <h6 class="pb-3">Tax(10%):<span>$232</span></h6>
            </div>
          </div>
          <div class="row justify-content-sm-end text-right">
            <div class="col-lg-3 col-12">
              <div class="total-amount">
                <p>Total Amount</p>
                <div class="amount pb-2">${{ $invoice->order->price }}</div>
              </div>
            </div>
          </div>
        </div>

        <div class="thankyou-div">
          <div class="row align-items-center justify-content-between">
            <div class="col-lg-9 col-md-9">
              <h4 class="thankyou-heading">Thankyou</h4>
            </div>
            <div class="col-lg-3 col-md-3  col-sm-12">
              <div class="phone">
                Phone:
                <p>(123) 456-7890</p>
              </div>
            </div>
          </div>
        </div>
        <div class="invoice-bottom">
          <div class="row">
            <div class="col-lg-9 col-12">
              <h5>
                Note:
                <span
                  >This is computer generated receipt and does not require
                  physical signature</span
                >
              </h5>
            </div>
            <div class="col-3 d-flex justify-content-sm-end">
              <h5>Support <span>@themenate.com</span></h5>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <script src="/js/user-app.js"></script>
  </body>
</html>
