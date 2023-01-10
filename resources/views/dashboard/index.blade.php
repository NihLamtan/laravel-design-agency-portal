@extends('layouts.user-dashboard')

@section('content')

@section('content')

<section id="welcome-sec">
     <div class="container">
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <h4 class="sec-main-hd welcome-hd">
             welcome,<span class="user-name">{{ ucfirst(auth()->user()->first_name) }}</span>
           </h4>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-4 col-md-4 col-6">
           <div class="user-feature-wrap d-flex align-items-center">
             <div
               class="
                 feat-icon-warp feat-icon-warp-1
                 d-flex
                 justify-content-center
                 align-items-center
               "
             >
               <img
                 src="../images/total-order-icon.svg"
                 alt=""
                 class="user-feat-icon"
               />
             </div>
             <div class="feat-content-area">
               <h5 class="feat-hd">total orders</h5>
               <h2 class="tot-order-num feat-num">20</h2>
             </div>
           </div>
         </div>
         <div class="col-lg-4 col-md-4 col-6">
           <div class="user-feature-wrap d-flex align-items-center">
             <div
               class="
                 feat-icon-warp feat-icon-warp-2
                 d-flex
                 justify-content-center
                 align-items-center
               "
             >
               <img
                 src="../images/pending-icon.svg"
                 alt=""
                 class="user-feat-icon"
               />
             </div>
             <div class="feat-content-area">
               <h5 class="feat-hd">pending</h5>
               <h2 class="tot-order-num feat-num">8</h2>
             </div>
           </div>
         </div>
         <div class="col-lg-4 col-md-4 col-6">
           <div class="user-feature-wrap d-flex align-items-center">
             <div
               class="
                 feat-icon-warp feat-icon-warp-3
                 d-flex
                 justify-content-center
                 align-items-center
               "
             >
               <img
                 src="../images/secceeded-icon.svg"
                 alt=""
                 class="user-feat-icon"
               />
             </div>
             <div class="feat-content-area">
               <h5 class="feat-hd">succeeded</h5>
               <h2 class="tot-order-num feat-num">12</h2>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
   <section id="order-sec">
     <div class="container">
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <div class="order-sec-content-area">
             <h4 class="sec-main-hd order-sec-hd">your orders</h4>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <div class="order-options-wrap">
             <div class="row order-option-row">
               <div class="col-lg-3 col-md-3 col-3">
                 <h5 class="order-opt-hd title-hd">title</h5>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <h5 class="order-opt-hd text-center">status</h5>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <h5 class="order-opt-hd text-center">created</h5>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <h5 class="order-opt-hd text-center">payment status</h5>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <h5 class="order-opt-hd text-center">price</h5>
               </div>
               <div class="col-lg-1 col-md-1 col-1"></div>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <div class="order-feat-wrap">
             <div class="row m-0">
               <div class="col-lg-3 col-md-3 col-3">
                 <div class="order-feature-wrap d-flex align-items-center">
                   <h5 class="order-feat-hd title-hd">logo design</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a
                     href="#"
                     class="fullfilled-btn btn btn-primary feat-btn"
                     >fullfilled</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd text-center">may 17,2021</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="btn btn-primary feat-btn paid-btn"
                     >paid</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd price text-center">$299</h5>
                 </div>
               </div>
               <div class="col-lg-1 col-md-1 col-1">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="view-order">view order</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <div class="order-feat-wrap">
             <div class="row m-0">
               <div class="col-lg-3 col-md-3 col-3">
                 <div class="order-feature-wrap d-flex align-items-center">
                   <h5 class="order-feat-hd title-hd">logo design</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="pending-btn btn btn-primary feat-btn"
                     >pending</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd text-center">may 17,2021</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="btn btn-primary feat-btn unpaid-btn"
                     >unpaid</a
                   >
                   <a href="#" class="btn btn-primary feat-btn play-btn"
                     >play now</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd price text-center">$299</h5>
                 </div>
               </div>
               <div class="col-lg-1 col-md-1 col-1">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="view-order">view order</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <div class="order-feat-wrap">
             <div class="row m-0">
               <div class="col-lg-3 col-md-3 col-3">
                 <div class="order-feature-wrap d-flex align-items-center">
                   <h5 class="order-feat-hd title-hd">logo design</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a
                     href="#"
                     class="fullfilled-btn btn btn-primary feat-btn"
                     >fullfilled</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd text-center">may 17,2021</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="btn btn-primary feat-btn unpaid-btn"
                     >unpaid</a
                   >
                   <a href="#" class="btn btn-primary feat-btn play-btn"
                     >play now</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd price text-center">$299</h5>
                 </div>
               </div>
               <div class="col-lg-1 col-md-1 col-1">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="view-order">view order</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <div class="order-feat-wrap">
             <div class="row m-0">
               <div class="col-lg-3 col-md-3 col-3">
                 <div class="order-feature-wrap d-flex align-items-center">
                   <h5 class="order-feat-hd title-hd">logo design</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="pending-btn btn btn-primary feat-btn"
                     >pending</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd text-center">may 17,2021</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="btn btn-primary feat-btn paid-btn"
                     >paid</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd price text-center">$299</h5>
                 </div>
               </div>
               <div class="col-lg-1 col-md-1 col-1">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="view-order">view order</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <div class="order-feat-wrap">
             <div class="row m-0">
               <div class="col-lg-3 col-md-3 col-3">
                 <div class="order-feature-wrap d-flex align-items-center">
                   <h5 class="order-feat-hd title-hd">logo design</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="pending-btn btn btn-primary feat-btn"
                     >pending</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd text-center">may 17,2021</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="btn btn-primary feat-btn paid-btn"
                     >paid</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd price text-center">$299</h5>
                 </div>
               </div>
               <div class="col-lg-1 col-md-1 col-1">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="view-order">view order</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <div class="order-feat-wrap">
             <div class="row m-0">
               <div class="col-lg-3 col-md-3 col-3">
                 <div class="order-feature-wrap d-flex align-items-center">
                   <h5 class="order-feat-hd title-hd">logo design</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a
                     href="#"
                     class="fullfilled-btn btn btn-primary feat-btn"
                     >fullfilled</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd text-center">may 17,2021</h5>
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="btn btn-primary feat-btn paid-btn"
                     >paid</a
                   >
                 </div>
               </div>
               <div class="col-lg-2 col-md-2 col-2">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <h5 class="order-feat-hd price text-center">$299</h5>
                 </div>
               </div>
               <div class="col-lg-1 col-md-1 col-1">
                 <div
                   class="
                     order-feature-wrap
                     d-flex
                     align-items-center
                     justify-content-center
                   "
                 >
                   <a href="#" class="view-order">view order</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="container">
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12 text-center">
           <div class="dashboard-btn">
             <a
               href=""
               class="
                 btn btn-primary
                 rounded-pill
                 view-all-orders-btn
                 dashboard-main-btn
               "
               >view all orders</a
             >
           </div>
         </div>
       </div>
     </div>
   </section>
   <section id="notification-sec">
     <div class="container">
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <h4 class="sec-main-hd noti-sec-hd">recent notifications</h4>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12 col-md-12 col-12">
           <div class="">
             <nav id="notification-nav">
               <ul class="notification-list list-unstyled m-0">
                 <li>
                   <div class="notifications-wrap">
                     <div
                       class="d-flex align-items-center noti-content-wrap"
                     >
                       <div class="d-flex align-items-center col">
                         <img
                           src="../images/usa-flag.png"
                           alt=""
                           class="usa-flag"
                         />
                         <div class="notification-hd">
                           <h6 class="nofication-title">logo in usa</h6>
                           <p class="notification-content m-0">
                             comment on your new project
                           </p>
                         </div>
                       </div>
                       <div class="col">
                         <div
                           class="
                             d-flex
                             justify-content-between
                             align-items-center
                           "
                         >
                           <div class="">
                             <h5 class="notification-timing mb-2">
                               may 17,2021 - 06:50pm
                             </h5>
                             <div
                               class="noti-status d-flex align-items-center"
                             >
                               <img
                                 src="../images/unread-icon.svg"
                                 alt=""
                                 class="unread-icon"
                               />
                               <h6 class="noti-status-hd m-0">unread</h6>
                             </div>
                           </div>
                           <div class="">
                             <i
                               class="fas fa-chevron-right noti-aero-icon"
                             ></i>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="noti-sep"></div>
                   </div>
                 </li>
                 <li>
                   <div class="notifications-wrap">
                     <div
                       class="d-flex align-items-center noti-content-wrap"
                     >
                       <div class="d-flex align-items-center col">
                         <img
                           src="../images/usa-flag.png"
                           alt=""
                           class="usa-flag"
                         />
                         <div class="notification-hd">
                           <h6 class="nofication-title">logo in usa</h6>
                           <p class="notification-content m-0">
                             comment on your new project
                           </p>
                         </div>
                       </div>
                       <div class="col">
                         <div
                           class="
                             d-flex
                             justify-content-between
                             align-items-center
                           "
                         >
                           <div class="">
                             <h5 class="notification-timing mb-2">
                               may 17,2021 - 06:50pm
                             </h5>
                             <div
                               class="noti-status d-flex align-items-center"
                             >
                               <img
                                 src="../images/read-icon.svg"
                                 alt=""
                                 class="unread-icon"
                               />
                               <h6 class="noti-status-hd read m-0">read</h6>
                             </div>
                           </div>
                           <div class="">
                             <i
                               class="fas fa-chevron-right noti-aero-icon"
                             ></i>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="noti-sep"></div>
                   </div>
                 </li>
                 <li>
                   <div class="notifications-wrap">
                     <div
                       class="d-flex align-items-center noti-content-wrap"
                     >
                       <div class="d-flex align-items-center col">
                         <img
                           src="../images/usa-flag.png"
                           alt=""
                           class="usa-flag"
                         />
                         <div class="notification-hd">
                           <h6 class="nofication-title">logo in usa</h6>
                           <p class="notification-content m-0">
                             comment on your new project
                           </p>
                         </div>
                       </div>
                       <div class="col">
                         <div
                           class="
                             d-flex
                             justify-content-between
                             align-items-center
                           "
                         >
                           <div class="">
                             <h5 class="notification-timing mb-2">
                               may 17,2021 - 06:50pm
                             </h5>
                             <div
                               class="noti-status d-flex align-items-center"
                             >
                               <img
                                 src="../images/read-icon.svg"
                                 alt=""
                                 class="unread-icon"
                               />
                               <h6 class="noti-status-hd read m-0">read</h6>
                             </div>
                           </div>
                           <div class="">
                             <i
                               class="fas fa-chevron-right noti-aero-icon"
                             ></i>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="noti-sep"></div>
                   </div>
                 </li>
               </ul>
             </nav>
           </div>
         </div>
       </div>
     </div>
     <div class="container">
       <div class="row">
         <div class="cool-lg-12 col-md-12 col-12 text-center">
           <div class="dashboard-btn view-noti-btn-area">
             <a
               href=""
               class="
                 btn btn-primary
                 rounded-pill
                 all-noti-btn
                 dashboard-main-btn
               "
               >view all notifications</a
             >
           </div>
         </div>
       </div>
     </div>
   </section>


@endsection