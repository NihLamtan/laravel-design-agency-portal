import jQuery from "jquery"
import "../js/import-jquery"
import "bootstrap"
import "@fortawesome/fontawesome-free"
import 'slick-carousel'
import Macy from "macy"
import "@fancyapps/fancybox"






import swal from 'sweetalert';

// slick slider

// jQuery(function () {
//     jQuery('.slider_content').slick({
//       prevArrow: '.previous',
//       nextArrow: '.next',
//       dots: true,
//     })
//   })
  
//   const accordianHeaders = document.querySelectorAll('.accordian-header')
  
//   accordianHeaders.forEach((accordianHeader) => {
//     accordianHeader.addEventListener('click', (event) => {
//       const currentlyActiveAccordianHeader = document.querySelector(
//         '.accordian-header.active',
//       )
//       if (
//         currentlyActiveAccordianHeader &&
//         currentlyActiveAccordianHeader !== accordianHeader
//       ) {
//         currentlyActiveAccordianHeader.classList.toggle('active')
//         currentlyActiveAccordianHeader.nextElementSibling.style.maxHeight = 0
//       }
  
//       accordianHeader.classList.toggle('active')
//       const accordianBody = accordianHeader.nextElementSibling
//       if (accordianHeader.classList.contains('active')) {
//         accordianBody.style.maxHeight = accordianBody.scrollHeight + 'px'
//       } else {
//         accordianBody.style.maxHeight = 0
//       }
//     })
//   })
  
  // var macyInstance = new Macy({
  //   container: '#macy-container',
  //   trueOrder: false,
  //   waitForImages: true,
  //   useOwnImageLoader: false,
  //   debug: true,
  //   mobileFirst: true,
  //   columns: 1,
  //   margin: {
  //     y: 16,
  //     x: '2%',
  //   },
  //   breakAt: {
  //     1200: 3,
  //     940: 3,
  //     520: 2,
  //     400: 2,
  //   },
  //   // See below for all available options.
  // })
//   convas js
  



//   video js


// const video = document.getElementById('video')
// const play = document.getElementById('play')
// const stop = document.getElementById('stop')
// const progress = document.getElementById('progress')
// const timeStamp = document.getElementById('timestamp')

// Play & Pause video

// function toggleVideoStatus() {
//   if (video.paused) {
//     video.play()
//   } else {
//     video.pause()
//   }
// }

// Update play/pause icon

// function updatePlayIcon() {
//   if (video.paused) {
//     play.innerHTML = '<i class="fa fa-play fa-2x"></i>'
//   } else {
//     play.innerHTML = '<i class="fa fa-pause fa-2x"></i>'
//   }
// }

// Update progress and timestamp

// function updateProgress() {
//   progress.value = (video.currentTime / video.duration) * 100

//   // Get Minutes

//   let mins = Math.floor(video.currentTime / 60)
//   if (mins < 10) {
//     mins = '0' + String(mins)
//   }

  // Get Seconds

//   let secs = Math.floor(video.currentTime % 60)
//   if (secs < 10) {
//     secs = '0' + String(secs)
//   }

//   timeStamp.innerHTML = `jQuery{mins}:jQuery{secs}`
// }

// Set video time to progress

// function setVideoProgress() {
//   video.currentTime = (+progress.value * video.duration) / 100
// }

// Stop video

// function stopVideo() {
//   video.currentTime = 0
//   video.pause()
// }

// Event listener

// video.addEventListener('click', toggleVideoStatus)
// video.addEventListener('pause', updatePlayIcon)
// video.addEventListener('play', updatePlayIcon)
// video.addEventListener('timeupdate', updateProgress)

// play.addEventListener('click', toggleVideoStatus)

// stop.addEventListener('click', stopVideo)

// progress.addEventListener('change', setVideoProgress)
// const fixHeader = document.getElementById("header");

// window.addEventListener("scroll", function (e) {
//   if (window.scrollY > 100) {
//     fixHeader.classList.add("fixed-top");
//   } else {
//     fixHeader.classList.remove("fixed-top");

//   }

// });

// $(function(){
//   alert('success')
// })


// // handle refund popup
// $(window).on('click', '.refund-button', function(e){
//   alert('success');
// })