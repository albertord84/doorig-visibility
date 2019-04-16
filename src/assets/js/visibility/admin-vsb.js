$(function() {
  //Bootstrap-TouchSpin
  $(".vertical-spin").TouchSpin({
      verticalbuttons: true
  });
  var vspinTrue = $(".vertical-spin").TouchSpin({
      verticalbuttons: true
  });
  if (vspinTrue) {
      $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
  }
});


