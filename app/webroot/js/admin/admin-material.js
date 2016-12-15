//$(document).ready(function(){
  //MATERIAL INPUT LABELS
  var inputs = $('input[type="text"],input[type="email"],input[type="password"]');
  inputs.next('label').each(function() {
    $(this).addClass("material-label");
    var input = $(this).prev('input');
    if(input.val() != ""){
      $(this).addClass('material-label-focus');
    }
  });

  //SETUP FOCUS TRIGGER
  inputs.on('focus', function(){
    console.log("focus on the bish");
    $(this).next('label').addClass("material-label-focus");
  }).on('focusout', function(){
    if($(this).val() == ""){
      $(this).next('label').removeClass("material-label-focus");
    }
  });

  $('label').on('click', function(){
    $(this).prev('input').focus();
  });

  $('input').attr('autocomplete', 'off');
//});
