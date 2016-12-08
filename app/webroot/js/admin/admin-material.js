$(document).ready(function(){
  //MATERIAL INPUT LABELS
  var inputs = $('input[type="text"],input[type="email"],input[type="password"]');
  inputs.prev('label').each(function() {
    $(this).addClass("material-label");
    var input = $(this).next('input');
    if(input.val() != ""){
      $(this).addClass('material-label-focus');
    }
  });

  //SETUP FOCUS TRIGGER
  inputs.on('focus', function(){
    console.log("focus on the bish");
    $(this).prev('label').addClass("material-label-focus");
  }).on('focusout', function(){
    if($(this).val() == ""){
      $(this).prev('label').removeClass("material-label-focus");
    }
  });

  $('label').on('click', function(){
    $(this).next('input').focus();
  });
});
