$(document).ready(function(){

  //INPUT
  //MATERIAL INPUT LABELS
  var inputs = $('input[type="text"],input[type="email"],input[type="password"],input[type="number"]');
  inputs.next('label').each(function() {
    $(this).addClass("material-label");
    var input = $(this).prev('input');
    if(input.val() != ""){
      $(this).addClass('material-label-focus');
    }
  });

  $('select').select2({
    width: '100%',
    minimumResultsForSearch: 5,
    language: lang
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

  //MENU
  $('.dropdown-admin').on('click', function(){
    $(this).find('ul').slideToggle('fast');
  });

  //TOOLTIPS
  $('.material-tooltip').tooltip();

  //TRANSLATION SELECT
  $('.language_select').on('change', function(e){
    //Redirect to somepage
    var url = document.createElement("a");
    url.href = window.location.href;
    var lang = $(this).val();
    console.log(url.pathname);
    $.ajax({
      'url': '/settings/get_translate_url',
      'data': {"url":url.pathname, "language":lang},
      'type': 'POST'
    }).done(function(data){
      window.location = data;
    });
  });
});
