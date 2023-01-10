@extends('frontend-layout')

<style>
 .slider-arrow {
  background-color: #B22234;
    border: 2px solid #B22234;
    border-radius: 100px;
    width: 40px;
    height: 40px;
    color: #fff;
 }
 .back-slide{
   position: absolute;
   left: 11px;
    top: -8px;
 }
 .next-slide{
   position: absolute;
   right: 4px;
    top: -8px;
 }
 .slick-slide{
   width: 150px;
 }
 #footer ul {
    
    flex-wrap: wrap;
}
 @media(max-width:767px){
    .dropdown {
      margin-bottom: 20px;
    }
    .drop-icon {
      margin-left: 10px;
      font-size: 19px;
    }
    .dropdown .btn-dropdown {
      
      font-weight: 600;
font-size: 16px;
line-height: 16px;
      color: #fff;
      padding: 0;
      border: 0;
      transition: 0s;
      width : 100%;
      padding : 10px ;
      background : #3C3B6E;
      border-radius : 0;
    }
   
    .dropdown .btn-dropdown:focus {
      border-color: transparent;
      box-shadow : 0 0 0;
      color: #fff;

    }
    .dropdown .btn-dropdown:hover  {
      background : #3C3B6E;
      color: #fff;
    

    }
  
    .dropdown.show .dropdown-toggling .drop-icon {
      transform: rotate(90deg);
      transition: 0.4s;
    }
    .dropdown-toggling .drop-icon {
      transition: 0.08s;
    }
   
    .tab {
      display: none;
    }
   .dropdown-menu li {
     padding : 10px;
     border-bottom :1px solid #ededed;
   }
   .dropdown .dropdown-menu li a {
    font-family: Open Sans;
font-weight: 600;
font-size: 16px;
line-height: 16px;
color : #000;
text-transform: capitalize;
      padding : 0 !important;
      text-decoration: none;

   }
   ul.portfolio-tabs-links.dropdown-menu.show {
    padding: 0;
    margin: 0 !important;
    border-radius : 0;
    background-color: #fcfcfc;
      box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.08);
      width : 100%;
}
.dropdown-item.active, .dropdown-item:active {
    text-decoration: none;
    background-color: transparent !important;
}
  }
</style>

@section('title', 'Portfolio')


@section('content')

  <section class="banner-bg-img">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-7 col-md-10  col-12">
        <div class="inner-banner-content">
          <h1 class="inner-banner-heading"><span>LogoInUSA </span>Portfolio</h1>
          <p class="inner-banner-para">With our service packages made for businesses of all
          sizes, we are the strategic partner you need to
          expand your business network.</p>
          <button class="dark-btn schedule-btn ml-0">Check Price</button>
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

  <section class="portfolio-sec">
      <div class="container">
          <div class="row text-center justify-content-center">
              <div class="col-lg-6 col-md-8 col-12">
                  <h2 class="section-heading">Our Portfolio</h2>
                  <p class="section-intro">Our portfolio that we’ve done for our clients. We
                    help them make their unique ideas stand out.</p>
              </div>
          </div>
         
        <div class="row  align-items-center d-block d-lg-none d-md-none pb-4">
          <div class="col-6 ">
            <div class="dropdown">
            <button
              class="btn btn-dropdown icon dropdown-toggling d-flex align-items-center justify-content-between"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
            
              aria-expanded="false"
            >
             <span class="btn-name"> Logo </span> <i class="fas fa-chevron-right drop-icon"></i>
            </button>
              
          <ul  class="portfolio-tabs-links dropdown-menu"  aria-labelledby="dropdownMenuButton">
            <li><a class='dropdown-item logo-tab' data-toggle="tab" class="active" href="#portfolio-tab1">Logo</a></li>
            <li><a class='dropdown-item bs-card-tab' data-toggle="tab" href="#portfolio-tab2">Business Card</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#portfolio-tab3">Stationery</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#portfolio-tab4">Brand Guide</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#portfolio-tab5">Facebook Cover</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#portfolio-tab6">App Design</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#portfolio-tab7">Icon</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#portfolio-tab8">Form</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#portfolio-tab9">Flyer</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#portfolio-tab10">Billboard</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#menu1">Infographic</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#menu1">Menu</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#menu1">T-shirt</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#menu1">Bag</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#menu1">Sticker</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#menu1">Cup</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#menu1">Illustration</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#menu1">Label</a></li>
            <li><a class='dropdown-item' data-toggle="tab" href="#menu1">Packaging</a></li>
          </ul>
         
        </div>
      </div>
    </div>
   
          <div class="row">
              <div class="col">
                  <div class="row">
                      <div class="col-3">
                        <div class="portfolio-sidebar-tabs d-lg-block d-md-block d-none">
                                <ul class="portfolio-tabs-links nav d-block">
                                    <li><a data-toggle="tab" class="active show" href="#portfolio-tab1">Logo</a></li>
                                    <li><a data-toggle="tab" href="#portfolio-tab2">Business Card</a></li>
                                    <li><a data-toggle="tab" href="#portfolio-tab3">Stationery</a></li>
                                    <li><a data-toggle="tab" href="#portfolio-tab4">Brand Guide</a></li>
                                    <li><a data-toggle="tab" href="#portfolio-tab5">Facebook Cover</a></li>
                                    <li><a data-toggle="tab" href="#portfolio-tab6">App Design</a></li>
                                    <li><a data-toggle="tab" href="#portfolio-tab7">Icon</a></li>
                                    <li><a data-toggle="tab" href="#portfolio-tab8">Form</a></li>
                                    <li><a data-toggle="tab" href="#portfolio-tab9">Flyer</a></li>
                                    <li><a data-toggle="tab" href="#portfolio-tab10">Billboard</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Infographic</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Menu</a></li>
                                    <li><a data-toggle="tab" href="#menu1">T-shirt</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Bag</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Sticker</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Cup</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Illustration</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Label</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Packaging</a></li>
                                  </ul>
                        </div>
                      </div>
                          <div class="col-lg-9 col-12 col-md-9">   
                            <div class="tab-content">
                              <div  id="portfolio-tab1" class="tab-pane fade in active show">

                            <div class="row text-center">
                             
                               <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img5.png"  alt="">

                               </div>
                               <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img5.png"  alt="">

                               </div> <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img6.png"  alt="">

                               </div> <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img7.png"  alt="">

                               </div> <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img8.png"  alt="">

                               </div> <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img9.png"  alt="">

                               </div> <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img10.png"  alt="">

                               </div> 
                               <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img11.png"  alt="">

                               </div>
                               <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img12.png"  alt="">

                               </div>
                               <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img13.png"  alt="">

                               </div>
                               <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img14.png"  alt="">

                               </div>
                               <div class="col-lg-4 col-6 col-md-6">
                               <img src="/images/portfolio-page-img-1.png " class="img-fluid mt-3" class="img-fluid" alt="">
 
                              </div>
                              <div class="col-lg-4  col-6 col-md-6">
                                <img src="/images/portfolio-page-img2.png" class="img-fluid mt-3" alt="">
  
                               </div>
                               <div class="col-lg-4 col-6 col-md-6 ">
                                <img src="/images/portfolio-page-img3.png" class="img-fluid mt-3" alt="">
                               </div>
                               <div class="col-lg-4 col-6 col-md-6">
                                <img class="img-fluid mt-3" src="/images/portfolio-page-img4.png mt-3"  alt="">
                               </div>
                             
                            
                            </div>   
                          
                                

                                </div>
                                <div id="portfolio-tab2" class="tab-pane fade">
                                  <div class="row">
                                    <div class="col-lg-4 col-6 col-md-6">
                                     <img src="/images/portfolio-page-img-1.png" class='img-fluid mt-3'  alt="">
       
                                    </div>
                                    <div class="col-lg-4 col-6 col-md-6">
                                      <img src="/images/portfolio-page-img2.png" class='img-fluid mt-3'  alt="">
        
                                     </div>
                                     <div class="col-lg-4 col-6 col-md-6">
                                      <img src="/images/portfolio-page-img3.png" class='img-fluid mt-3'  alt="">
                                     </div>
                                     <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img4.png"  alt="">
                                     </div>
                                     <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img5.png"  alt="">
      
                                     </div>
                                     <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img5.png"  alt="">
      
                                     </div> <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img6.png"  alt="">
      
                                     </div> <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img7.png"  alt="">
      
                                     </div> <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img8.png"  alt="">
      
                                     </div> <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img9.png"  alt="">
      
                                     </div> <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img10.png"  alt="">
      
                                     </div> 
                                     <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img11.png"  alt="">
      
                                     </div>
                                     <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img12.png"  alt="">
      
                                     </div>
                                     <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img13.png"  alt="">
      
                                     </div>
                                     <div class="col-lg-4 col-6 col-md-6">
                                      <img class="img-fluid mt-3" src="/images/portfolio-page-img14.png"  alt="">
      
                                     </div>
                                   
                                  
                                  </div>   
                                </div>
      
     
                              </div>
                          </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  
  <section id="portfolio-section-cta" class="section cta">
    <div class="container">
        <div class="row">
           <x-cta />
        </div>
    </div>
</section>

<script>
const dropBtn = document.querySelector('.btn-name');
    const tabBtns = document.querySelectorAll('.dropdown-item');
    tabBtns.forEach(tabBtn => {
      tabBtn.addEventListener('click' , (e) =>  {
        e.preventDefault()
        tabBtns.forEach(tabBtn => {
          tabBtn.classList.remove('active')
        });
        dropBtn.innerText = e.target.innerText
        })
      })
   
  
</script>
@endsection
