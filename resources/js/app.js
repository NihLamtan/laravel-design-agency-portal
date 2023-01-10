import 'slick-carousel/slick/slick-theme.css'
import 'slick-carousel/slick/slick.css'
import "@fancyapps/fancybox/dist/jquery.fancybox.min.css"
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap/dist/js/bootstrap.js"        
import 'bootstrap'
import "../../node_modules/notyf/notyf"

import jQuery from "jquery"
import "../js/import-jquery"
import 'slick-carousel'
import Macy from "macy"
import "@fancyapps/fancybox"
import { Notyf }   from 'notyf';




import swal from 'sweetalert';
// import macy from "macy"

// slick slider


$('.reponsive-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  infinite: true,
  arrows: true,
  prevArrow: '.back-slide',
  nextArrow: '.next-slide',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        centerMode: true,
        centerPadding: '30px',
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});




$(document).ready(function() {
  $('#scroll-tabs li a').click(function(e) {
  	
  	var targetHref = $(this).attr('href');
	  
	$('html, body').animate({
		scrollTop: $(targetHref).offset().top
	}, 1000);
    
    e.preventDefault();
  });
});

const toggleBtn =document.querySelector('.sidebar-toggle');
const closeBtn =document.querySelector('.close-btn');
const sidebar =document.querySelector('.mobile-menu');

toggleBtn.addEventListener('click', function(){
    // using add and remove class
    
    /*
    if(sidebar.classList.contains('show-sidebar')){
        sidebar.classList.remove('show-sidebar');
    }else{
        sidebar.classList.add('.show-sidebar');
    }
    */

    //using toggle
    sidebar.classList.toggle('show-sidebar');
});

closeBtn.addEventListener('click', function(){
    sidebar.classList.remove('show-sidebar');
});
   


jQuery('.service-slider').slick({
  autoplay: true,
  arrows: false,
  fade: true,
  infinite: true,
  speed: 500,
  cssEase: 'linear',
});

jQuery('.banner-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1000,
  arrows: false,
});


    jQuery('.slider_content').slick({
      prevArrow: '.previous',
      nextArrow: '.next',
      dots: true,
    })
  
  jQuery('.logo-slide').slick({
    autoplay: true,
    slidesToShow: 3,
    autoplaySpeed: 1000,
  })

  
// accordian 

const accordianHeaders = document.querySelectorAll('.accordian-header')
  
  accordianHeaders.forEach((accordianHeader) => {
    accordianHeader.addEventListener('click', (event) => {
      const currentlyActiveAccordianHeader = document.querySelector(
        '.accordian-header.active',
      )
      if (
        currentlyActiveAccordianHeader &&
        currentlyActiveAccordianHeader !== accordianHeader
      ) {
        currentlyActiveAccordianHeader.classList.toggle('active')
        currentlyActiveAccordianHeader.nextElementSibling.style.maxHeight = 0
      }
  
      accordianHeader.classList.toggle('active')
      const accordianBody = accordianHeader.nextElementSibling
      if (accordianHeader.classList.contains('active')) {
        accordianBody.style.maxHeight = accordianBody.scrollHeight + 'px'
      } else {
        accordianBody.style.maxHeight = 0
      }
    })
  })

const fixHeader = document.getElementById("header-fixed");

window.addEventListener("scroll", function (e) {
  if (window.scrollY > 100) {
    fixHeader.classList.add("fixed-top");
  } else {
    fixHeader.classList.remove("fixed-top");
  }
});



// handle refund popup
$(function(){
    $('.refund-button').on('click', function(e) {
        var orderId = $(this).attr('data-order_id');
        $('#order_id').val(orderId);
        $('#refund-modal').modal('show')
    })
})

$("#scroll").on("click", function (e) {
if (this.hash !== "") {
  e.preventDefault();

  const hash = this.hash;

  $("html, body").animate(
    {
      scrollTop: $(hash).offset().top,  
    },
    3000
  );
}
});

$("#cta-scroll").click(function () {
  //1 second of animation time
  //html works for FFX but not Chrome
  //body works for Chrome but not FFX
  //This strange selector seems to work universally
  $("html, body").animate({scrollTop: 6000}, 1000);
});


  

$(document).ready(function () {
  $('.nav-button').click(function () {
    $('body').toggleClass('nav-open')
  })
})

$(document).ready(function () {
  $('ul.tabs li').click(function () {
    var tab_id = $(this).attr('data-tab')

    $('ul.tabs li').removeClass('current')
    $('.tab-content').removeClass('current')

    $(this).addClass('current')
    $('#' + tab_id).addClass('current')
  })

  // login random image
  // var items = ['/images/login-img-2.jpg', '/images/login-image-3.jpg', '/images/login-image-1.jpg', '/images/login-image-4.jpg'];
  // var item = items[Math.floor(Math.random() * items.length)];
  // jQuery('.login-background').css('background-image', `url("${item}")`);

})
if(document.getElementById('macy-container')){
  var macyInstance = new Macy({
  container: '#macy-container',
  trueOrder: false,
  waitForImages: true,
  useOwnImageLoader: false,
  debug: true,
  mobileFirst: true,
  columns: 1,
  margin: {
    y: 16,
    x: '2%',
  },
  breakAt: {
    1200: 3,
    940: 3,
    520: 2,
    400: 2,
  },
  // See below for all available options.
})


}
// Tabs Slider

  const TabsSlider = jQuery('.tabs-slider').slick({
      // infinite: false,
      slidesToShow: 6,
      slidesToScroll: 1,
      prevArrow: '.previous-tab',
      nextArrow: '.next-tab',
      variableWidth: true,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
//  Portfolio slider
const portfolioSlider = jQuery('.portfolio-slider-all').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  prevArrow: '.previous-portfolio',
  nextArrow: '.next-portfolio',
  responsive: [
    {
      breakpoint: 1920,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 1366,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
 
     const portfolioSliderLogo = jQuery('.portfolio-slider-logo').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '.previous-logo',
      nextArrow: '.next-logo',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    const portfolioSliderWebsite = jQuery('.portfolio-slider-website').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '.previous-website',
      nextArrow: '.next-website',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    const portfolioSliderAds = jQuery('.portfolio-slider-ads').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '.previous-ad',
      nextArrow: '.next-ad',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    const portfolioSliderTshirts = jQuery('.portfolio-slider-tshirts').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '.previous-tshirt',
      nextArrow: '.next-tshirt',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    const portfolioSliderBrand = jQuery('.portfolio-slider-brand').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '.previous-brand',
      nextArrow: '.next-brand',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    const portfolioSliderPrint = jQuery('.portfolio-slider-print').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '.previous-print',
      nextArrow: '.next-print',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    const portfolioSliderBooks = jQuery('.portfolio-slider-books').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '.previous-book',
      nextArrow: '.next-book',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
   
const buttons = document.querySelectorAll('.portfolio-tab')
const section = document.querySelectorAll('.portfolio-filter')
console.log(section)

buttons.forEach(item => {
  item.addEventListener('click', () => {
    buttons.forEach(item => {
      item.className = "";
      item.className = "portfolio-tab";
    });
    item.className = "active";
    // show images
    let values = item.textContent;
    section.forEach(show => {
        show.style.display = "none";
        if (show.getAttribute("data-id") === values) {
            show.style.display = "block";
        }
    })
    portfolioSlider.slick('setPosition');
    portfolioSliderLogo.slick('setPosition');
    portfolioSliderWebsite.slick('setPosition');
    portfolioSliderAds.slick('setPosition');
    portfolioSliderTshirts.slick('setPosition');
    portfolioSliderBrand.slick('setPosition');
    portfolioSliderPrint.slick('setPosition');
    portfolioSliderBooks.slick('setPosition');
  })
})

// $(document).load(function() {
// 	$(".loader").delay(1000).fadeOut("slow");
//   $("#overlayer").delay(1000).fadeOut("slow");
// })
// const loaderEl = document.getElementsByClassName('fullpage-loader')[0];
// document.addEventListener('readystatechange', (event) => {
// 	// const readyState = "interactive";
// 	const readyState = "complete";
    
// 	if(document.readyState == readyState) {
// 		// when document ready add lass to fadeout loader
// 		loaderEl.classList.add('fullpage-loader--invisible');
		
// 		// when loader is invisible remove it from the DOM
// 		setTimeout(()=>{
// 			loaderEl.parentNode.removeChild(loaderEl);
// 		}, 2000)
// 	}
// });
