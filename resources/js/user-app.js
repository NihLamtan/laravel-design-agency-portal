
import jQuery from "jquery"
import "../js/import-jquery"
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap/dist/js/bootstrap.js"        
import 'bootstrap'
// import "../../public/frontend/css/style.css"


import notie from 'notie'
// handle refund popup





window.notie = notie;


$(function(){
    $('.refund-button').on('click', function(e) {
        var orderId = $(this).attr('data-order_id');
        $('#order_id').val(orderId);
        $('#refund-modal').modal('show')
    })
})
const userImg = document.querySelector(".header-user-img")
const toolTip = document.querySelector(".tooltip-main-wrap")

userImg.addEventListener("mouseover" , () => {
    if(toolTip.classList.contains("d-none")){
        toolTip.classList.remove("d-none")
    }
})
userImg.addEventListener("mouseout" , () => {
        toolTip.classList.add("d-none")
})
toolTip.addEventListener("mouseover" , () => {
    if(toolTip.classList.contains("d-none")){
        toolTip.classList.remove("d-none")
        toolTip.classList.add("anim")
    }
})
toolTip.addEventListener("mouseout" , () => {
        toolTip.classList.add("d-none")
})

$(function(){
    $('.refund-button').on('click', function(e) {
        var orderId = $(this).attr('data-order_id');
        $('#order_id').val(orderId);
        $('#refund-modal').modal('show')
    })
})
const profileInputTag = document.querySelector("#profile-img");
const profileImgTag =  document.querySelector("#profile-img-tag")

if(profileInputTag){
profileInputTag.addEventListener('change', function(event) {
  profileImgTag.src = URL.createObjectURL(event.target.files[0]);
});
}

// for mobile nav

const barBtn = document.querySelector(".bar-icon");
const mainBody = document.querySelector(".main-body-wrap")
const body = document.querySelector("body")
barBtn.addEventListener("click" , () => {
mainBody.classList.toggle("active")
mainBody.style.transition = "all 0.5s"
body.classList.toggle("active")

})

