<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
   

    <title>Logoinusa | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/fevicon/favicon-16x16.png') }}">
<link rel="stylesheet" href="/frontend-assets/css/new-style.min.css">
<link rel="stylesheet" href="/frontend-assets/css/slick.min.css">

 
    @livewireStyles

<style>
    .preloader {
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   z-index: 9999;
   background-image: url('/images/Preloader_2.gif');
   background-repeat: no-repeat; 
   background-color: #FFF;
   background-position: center;
}
</style>
</head>

<body>
    <div class="preloader"></div>
    <div class="mobile-menu  d-lg-none d-block">
        <div class="sidebar-top">

        <div class="row">
          {{-- <div class="col-6">
            <a href="/"><img src="/images/logo.svg" class="img-fluid" alt=""></a>
          </div> --}}
            <div class="col-12 d-flex justify-content-end">
              <button class="close-btn">
                <i class="fas fa-times"></i>
              </button>
          </div>
        </div>
        </div>
         
            
                  <ul class="links  ">
                    <li><a href="{{ route('categories') }}">Categories</a></li>
                    <li> <a href="{{ route('how-it-works') }}">How it works</a></li>
                        <li>  <a href="{{ route('portfolio') }}">Portfolio</a></li>
                           <li>  <a href="{{ route('support') }}">Support</a></li>
                             <li>   <a href="{{ route('login') }}">Sign in</a></li>
                           
                                
                               </ul>    
                               <div class="buttons d-flex justify-content-center text-center mt-3">
                                <button class="dark-btn mr-3">Try FREE</button>
                                <button class="dark-btn schedule-btn">Get Started</button>
                            </div>
                               <ul class="social-icons">
                                <li>
                                  <a href="#">
                                    <i class="fab fa-facebook"></i>
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                    <i class="fab fa-twitter"></i>
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                    <i class="fab fa-behance"></i>
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                    <i class="fab fa-linkedin"></i>
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                    <i class="fab fa-sketch"></i>
                                  </a>
                                </li>
                              </ul>
             
         
        </div>
        
         



            <header class="header mobile-header d-lg-none d-block">
                <div class="container">
                    <div class="row  align-items-center">
                        <div class="col-3 ">
      
         <span  class="sidebar-toggle"><i class="fas fa-bars"></i></span> 
            
                      
          </div>
        
                        <div class="col-6">
                         <a href="/">   <img src="../images/logo.svg" class="img-fluid" alt=""></a>
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-end">
                            <a href=""><i class="fas fa-phone-alt"></i></a>
                        </div>
                    </div>
                </div>
            </header>


  <header class="header d-none d-lg-block" id="header-fixed">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-between">
        <div class="col-4">
            <div class="logo">
             <a href="/"><img src="../images/logo.svg" alt="" class="img-fluid" /></a>
            </div>
        </div>
        <div class="col-8 p-0 d-flex justify-content-end">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid pr-0">
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="collapse navbar-collapse"
                id="navbarSupportedContent"
              >
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('categories') }}"
                          >
                          Services</a
                        >
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="{{ route('how-it-works') }}"
                          >
                          How it works</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio') }}"
                          >
                          Portfolio</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('support') }}"
                        >
                        Support</a
                        >
                    </li>
                    @if(!auth()->check())
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}"
                        >
                        Sign in
                        </a>
                    </li>
                    @endif
                </ul>
                @if(!auth()->check())
                <button class="dark-btn">
                    Try FREE
                </button>
                @endif
                @if(auth()->check())
                <a href="{{ route('account.dashboard') }}">
                <button class="dark-btn">
                   My Account
                </button>
              </a>
                @endif
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
      @yield('content')
      <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="../images/logo.svg" alt="">
                    <div class="links company-links">
                        <ul>
                            <li><a href="{{ route('who-we-are') }}">About</a>
                              <div class="seprator"></div>
                            </li>
                            <li><a href="{{ route('portfolio') }}">Portfolio</a>
                              <div class="seprator"></div>
                            </li>
                            <li><a href="{{ route('how-it-works') }}">How it works</a>
                              <div class="seprator"></div>
                            </li>
                            <li><a href="{{ route('contact') }}">Contact</a>
                              <div class="seprator"></div>
                            </li>
                            <li><a href="{{ route('support') }}">Support</a>
                            </li>
                        </ul>
                    </div>
                    <div class="policy-links">
                      <ul>
                        <li><a href="{{ route('who-we-are') }}">Terms & Conditions</a>
                          <div class="seprator"></div>
                        </li>
                        <li><a href="{{ route('portfolio') }}">Pricacy policy</a>
                          <div class="seprator"></div>
                        </li>
                        <li><a href="{{ route('how-it-works') }}">Refund policy</a>
                          <div class="seprator"></div>
                        </li>
                        <li><a href="{{ route('contact') }}">Cookie policy</a>
                          <div class="seprator"></div>
                        </li>
                        <li><a href="{{ route('support') }}">Copyright policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-links">
                      <ul class="d-flex">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                      </ul>
                    </div>
                </div>
            </div>
                
    </footer>
    
    <script src="/js/global.min.js"></script>
    
    <script src="/js/app.min.js" ></script>


    @livewireScripts

    @stack('script')
    
    <script>
        $(window).on('load', function() { 
            $('.preloader').fadeOut('slow');

         });
  
    </script>
</body>
</html>