<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        {{-- bootstrap --}}
    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <!-- Styles -->

        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}


        {{-- <link href="/frontend/css/sb-admin-2.min.css" rel="stylesheet"> --}}


        {{-- <link rel="stylesheet" href="/frontend/css/style.backup.css"> --}}
        {{-- <link href="/frontend/css/sb-admin-2.min.css" rel="stylesheet"> --}}

        <link rel="stylesheet" href="/frontend/css/app.min.css">
        <link rel="stylesheet" type="text/css" href="/plugins/trix/trix.css">
        <link rel="stylesheet" type="text/css" href="/plugins/trix/attachments.css">
        {{-- <link rel="stylesheet" href="/frontend/css/style.css"> --}}



        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    
    <body class="font-sans antialiased">
       
     
        <div class="app">
            <div class="layout">
                <!-- Header START -->
                <div class="header">
                    <div class="logo logo-dark">
                        <a href="index.html">
                            {{-- <img src="/images/logo.png" alt="Logo" style="width: 50px;"> --}}
                            <img  src="/images/logo.png" class="ml-3" width="200px" alt="Logo">
                            <img class="logo-fold" src="/images/flag.png" style="width: 40px" alt="Logo">
                        </a>
                    </div>
                    <div class="logo logo-white">
                        <a href="index.html">
                            <img src="/images/logo/logo-white.png" alt="Logo">
                            <img class="logo-fold" src="/images/logo/logo-fold-white.png" alt="Logo">
                        </a>
                    </div>
                    <div class="nav-wrap">
                        <ul class="nav-left">
                            <li class="desktop-toggle">
                                <a href="javascript:void(0);">
                                    <i class="anticon"></i>
                                </a>
                            </li>
                            <li class="mobile-toggle">
                                <a href="javascript:void(0);">
                                    <i class="anticon"></i>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                    <i class="anticon anticon-search"></i>
                                </a>
                            </li> --}}
                        </ul>
                        <ul class="nav-right">
                            <li class="dropdown dropdown-animated scale-left">
                                <a href="javascript:void(0);" data-toggle="dropdown">
                                    <i class="anticon anticon-bell notification-badge"></i>
                                </a>
                                <div class="dropdown-menu pop-notification">
                                    <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                        <p class="text-dark font-weight-semibold m-b-0">
                                            <i class="anticon anticon-bell"></i>
                                            <span class="m-l-10">Notifications</span>
                                        </p>
                                        <a class="btn-sm btn-default btn" href="{{ route('notifications.index') }}">
                                            <small>View All</small>
                                        </a>
                                    </div>
                                    <div class="relative">
                                        <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                            @foreach(auth()->user()->notifications as $notification)
                                            <a href="{{ $notification->link ?? 'javascript:void(0);' }}" class="dropdown-item d-block p-15 border-bottom">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-blue avatar-icon">
                                                        <i class="anticon anticon-mail"></i>
                                                    </div>
                                                    <div class="m-l-15">
                                                        <p class="m-b-0 text-dark">{{ $notification->data['title'] }}</p>
                                                        <p class="m-b-0"><small>{{ $notification->created_at->diffForHumans() }}</small></p>
                                                    </div>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown dropdown-animated scale-left">
                                <div class="pointer" data-toggle="dropdown">
                                    <div class="avatar avatar-image  m-h-10 m-r-15">
                                        <img  src="{{ auth()->user()->profile_photo_path }}" alt="" />
                                    </div>
                                </div>
                                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                        <div class="d-flex m-r-50">
                                            <div class="avatar avatar-lg avatar-image">
                                                
                                                {{-- <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="" /> --}}
                                                
                                            </div>
                                            <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                                                {{-- <p class="m-b-0 opacity-07">UI/UX Desinger</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                  
                                   
                                <a href="{{ route('orders.index') }}" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                                <span class="m-l-10">Orders</span>
                                            </div>
                                        </div>
                                    </a>
                                <a href="{{ route('profile') }}" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                                <span class="m-l-10">Account Setting</span>
                                            </div>
                                        </div>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="dropdown-item d-block p-h-15 p-v-10" onclick="event.preventDefault();
                                        this.closest('form').submit();">

                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                                        <span class="m-l-10">Logout</span>
                                                    </div>
                                                </div>
                                            </a>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                    <i class="anticon anticon-appstore"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                {{-- {{ Breadcrumbs::render('home') }} --}}

                </div>    
                <!-- Header END -->
    
                <!-- Side Nav START -->
                <div class="side-nav">
                    <div class="side-nav-inner">
                        <ul class="side-nav-menu scrollable">
                            <li class="nav-item dropdown open">
                            <a class="dropdown-toggle" href="{{ route('orders.index') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-dashboard"></i>
                                    </span>
                                    <span class="title">Orders</span>
                                    <span class="arrow">
                                    </span>
                                </a>
                               
                            </li>
                            <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="{{ route('files.index') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-appstore"></i>
                                    </span>
                                    <span class="title">Storage</span>
                                    <span class="arrow">
                                    </span>
                                </a>
                                
                            </li>
                            <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="{{ route('invoices.index') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-build"></i>
                                    </span>
                                    <span class="title">Invoices</span>
                                    <span class="arrow">
                                    </span>
                                </a>
                               
                            </li>
                            

                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="{{ route('update-password') }}">
                                        <span class="icon-holder">
                                            <i class="anticon anticon-hdd"></i>
                                        </span>
                                        <span class="title">Update Password</span>
                                        <span class="arrow">
                                        </span>
                                    </a>
                                    
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle" href="{{ route('profile') }}">
                                            <span class="icon-holder">
                                                <i class="anticon anticon-hdd"></i>
                                            </span>
                                            <span class="title">Settings</span>
                                            <span class="arrow">
                                            </span>
                                        </a>
                                        
                                    </li>
                           
                        </ul>
                    </div>
                </div>
                <!-- Side Nav END -->
    
                <!-- Page Container START -->
                <div class="page-container">
                    
    
                    <!-- Content Wrapper START -->
                    <div class="main-content">
                       @yield('table')
                       {{ $slot }}
                        
                            
                    </div>
                    <!-- Content Wrapper END -->
    
                    <!-- Footer START -->
                  
                    <!-- Footer END -->
    
                </div>

                <!-- Page Container END -->
    
                <!-- Search Start-->
                <div class="modal modal-left fade search" id="search-drawer">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Search</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-search"></i>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Files</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-cyan avatar-icon">
                                            <i class="anticon anticon-file-excel"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                            <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-blue avatar-icon">
                                            <i class="anticon anticon-file-word"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                            <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-purple avatar-icon">
                                            <i class="anticon anticon-file-text"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                            <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-red avatar-icon">
                                            <i class="anticon anticon-file-pdf"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                            <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Members</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                        
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                            <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                        
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                            <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                        
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                            <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                        </div>
                                    </div>
                                </div>   
                                <div class="m-t-30">
                                    <h5 class="m-b-20">News</h5> 
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                                                              </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                            <p class="m-b-0 text-muted font-size-13">
                                                <i class="anticon anticon-clock-circle"></i>
                                                <span class="m-l-5">25 Nov 2018</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>    

   
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search End-->
    
                <!-- Quick View START -->
                <div class="modal modal-right fade quick-view" id="quick-view">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Theme Config</h5>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="m-b-30">
                                    <h5 class="m-b-0">Header Color</h5>
                                    <p>Config header background color</p>
                                    <div class="theme-configurator d-flex m-t-10">
                                        <div class="radio">
                                            <input id="header-default" name="header-theme" type="radio" checked value="default">
                                            <label for="header-default"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-primary" name="header-theme" type="radio" value="primary">
                                            <label for="header-primary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-success" name="header-theme" type="radio" value="success">
                                            <label for="header-success"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                            <label for="header-secondary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-danger" name="header-theme" type="radio" value="danger">
                                            <label for="header-danger"></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Side Nav Dark</h5>
                                    <p>Change Side Nav to dark</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                        <label for="side-nav-theme-toogle"></label>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Folded Menu</h5>
                                    <p>Toggle Folded Menu</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                        <label for="side-nav-fold-toogle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <!-- Quick View END -->
            </div>
        </div>
    
     
      

        {{-- <script src="/js/user-app.js"></script>
        <script src="/js/global.js"></script> --}}
        @stack('script')

        <script src="/user-js/js/vendors.min.js"></script>

        <!-- page js -->
        <script src="/user-js/js/Chart.min.js"></script>
        <script src="/user-js/js/dashboard-default.js"></script>
    
        <!-- Core JS -->
        <script src="/user-js/js/app.min.js"></script>
        <script src="/js/user-app.js"></script>

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

    </body>
</html>
