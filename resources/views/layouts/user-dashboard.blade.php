<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logoinusa | @yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />

 
 
    <link rel="shortcut icon" href="{{ asset('images/fevicon/favicon-16x16.png') }}">
    <link rel="stylesheet" type="text/css" href="/plugins/trix/trix.css">
    <link rel="stylesheet" type="text/css" href="/plugins/trix/attachments.css">
    <link rel="stylesheet" href="/frontend/css/style.css">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/js/bootstrap-multiselect.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/css/bootstrap-multiselect.css">

@livewireStyles

<style>
  .alert-success{
    margin-top: 40px;
  }
</style>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>

  </head>
  <body>

    <div class="main-body-wrap">
      <!-- nav-for-mobile -->
      <div class="mobile-nav-wrap d-block d-md-none position-fixed">
        <div class="flag-wrap">
          <img
            src="../images/flag.png"
            alt=""
            class="usa-flag img-fluid"
          />
        </div>
        <nav class="mobile-nav">
          <ul class="mobile-nav-list list-unstyled">
            <li>
              <img
                src="/images/dashboard1.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="{{ route('account.dashboard') }}" class="mobile-nav-links"> dashboard </a>
            </li>
            <li>
              <img
                src="/images/Order.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="{{ route('orders.index') }}" class="mobile-nav-links"> order </a>
            </li>
            <li>
              <img
                src="/images/Storage.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="{{ route('files.index') }}" class="mobile-nav-links"> storage </a>
            </li>
            <li>
              <img
                src="/images/Invoices.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="{{ route('invoices.index') }}" class="mobile-nav-links"> invoices </a>
            </li>
            <li>
              <img
                src="/images/Setting.svg"
                alt=""
                class="mobile-nav-icon"
              />
              <a href="{{ route('account.setting') }}" class="mobile-nav-links"> setting </a>
            </li>
          </ul>
        </nav>
      </div>
          <header id="header" >
            <div class="header-wrap">
              <div class="container">
                <div class="row justify-content-between align-items-center">
                  <div class="col-3 d-block d-md-none">
                    <a href="#" class="bar-icon">
                      
                      <i class="fas fa-bars bar-icon"></i>
                    </a>
                  </div>
                  <div class="col-lg-4 col-md-4 col-5 p-0">
                    <div class="logo-wrap">
                      <img
                        src="/images/logo1.png"
                        alt=""
                        class="header-logo img-fluid"
                      />
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-3">
                    <div
                      class="
                        user-profile-area
                        d-flex
                        align-items-center
                        justify-content-end
                      "
                    >
                    @if(auth()->user()->unreadNotifications)

                      <a href="{{ route('notifications.index') }}" class="noti-icon"
                        ><div class="notification-area d-flex align-items-center">
                          <i class="far fa-bell notification-icon"></i>

                          <div
                            class="
                              notification-bg
                              d-flex
                              justify-content-center
                              align-items-center
                            "
                          >
                            <h6 class="nofication-counter">{{ auth()->user()->unreadNotifications()->count() }}</h6>
                          </div>

                          

                        </div>
                      </a>
                      @else

                      @endif

                      <div class="user-pf ml-3">
                        <img
                          src="../images/user-pf.png"
                          alt=""
                          class="user-img header-user-img"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="tooltip-main-wrap d-none">
                <div class="tooltip-wrap position-relative text-center">
                  <div class="tooltip-pf-area">
                    <img
                      src="../images/user-img-2.png"
                      alt=""
                      class="tooltip-user-img img-fluid"
                    />
                  </div>
                  <h5 class="tooltip-user-name text-center">{{ ucfirst(auth()->user()->first_name) }}{{ ucfirst(auth()->user()->last_name) }}</h5>
                  <nav class="tooltip-opt-nav">
                    <ul class="tooltip-opt-list m-0 list-unstyled">
                      <li>
                        <a href="{{ route('account.profile') }}" class="list-item">
                          <div
                            class="tooltip-content-area d-flex align-items-center"
                          >
                            <img
                              src="../images/user-icon-tooltip.svg"
                              alt=""
                              class="tooltip-user-icon"
                            />
                            <h6 class="tooltip-content-hd">profile</h6>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('account.profile') }}" class="list-item">
                          <div
                            class="tooltip-content-area d-flex align-items-center"
                          >
                            <img
                              src="../images/edit-pf-icon.svg"
                              alt=""
                              class="tooltip-user-icon"
                            />
                            <h6 class="tooltip-content-hd">edit profile</h6>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="list-item">
                          <div
                            class="tooltip-content-area d-flex align-items-center"
                          >
                            <img
                              src="../images/setting-icon-tool.svg"
                              alt=""
                              class="tooltip-user-icon"
                            />
                            <h6 class="tooltip-content-hd">account setting</h6>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                  <a class="sign-out-btn btn btn-primary rounded-pill text-center" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  this.closest('form').submit();" >sign out</a>
              </form>
                  {{-- <a
                    href="#"
                    class="sign-out-btn btn btn-primary rounded-pill text-center"
                    >sign out</a
                  > --}}
                  <div class="triangle-up position-absolute d-none"></div>
                </div>
              </div>
            </div>
          </header>
  
@yield('nav-bar')

    <div class="container">
      <div class="row">
        <div class="col-12">
          @include('partials.alerts')
        </div>
      </div>
    </div>

    @yield('content')

    

    @stack('script')

    @livewireScripts

    @stack('modals')

        @if (session('success'))
    @push('script')

        <script>
            notie.alert({
                type: 'success',
                text: success,
                stay: true,
                time: 3,
                position: 'top'
            })
        </script>
        @endpush

        @endif

    <script src="/js/user-app.js"></script>
    <script src="/js/global.js"></script>



  </body>
</html>
