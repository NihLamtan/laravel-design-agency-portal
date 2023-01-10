// import "../../public/admin/css/style.css"
import jQuery from "jquery"
import "../js/import-jquery"



$('.add').click(function() {
  var template1 = '<div class="remove-field">'
  template1 += '<div class="row align-items-center offset-2 mt-3  justify-content-center">'
  template1 += '<div class="col-3"><label for="title">Title</label><input type="text" class="form-control" name="title[]"></div>'
  template1 += '<div class="col-3"><label for="description">Description</label><input type="text" class="form-control" name="description[]"></div>'
  template1 += '<div class="col-3"><label for="amount">Amout</label><input type="amount" class="form-control" name="amount[]"></div>'
  template1 += '<div class="col-3"><button  type="button" class="btn btn-remove remove">Remove</button></div></div>'
  
 $('.optionBox').append(template1);

 $('.remove').click(function() {
  $(this).parent().parent().parent('div').remove();
});


});

