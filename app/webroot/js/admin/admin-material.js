//$(document).ready(function(){
  //MATERIAL INPUT LABELS
  var inputs = $('input[type="text"],input[type="email"],input[type="password"],input[type="number"]');
  inputs.next('label').each(function() {
    $(this).addClass("material-label");
    var input = $(this).prev('input');
    if(input.val() != ""){
      $(this).addClass('material-label-focus');
    }
  });

  //SETUP FOCUS TRIGGER
  inputs.on('focus change keyup', function(){
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

  //TOOLTIPS
  $('.material-tooltip').tooltip();

  $('.dropdown-admin').on('click', function(){
    $(this).find('ul').slideToggle('fast');
  });
//});
