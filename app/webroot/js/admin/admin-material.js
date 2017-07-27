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

  //SELECT 2
  function formatState (state) {
    if (!state.id) { return state.text; }
    var $element = $(state.element).parent();
    if($element.data('flags') !== undefined){
      var lang = $(state.element).val();
      if(lang == 'en') lang = 'gb';
      var $state = $('<span><span class="flag-icon flag-icon-'+lang+'"></span> ' + state.text + '</span>');
      return $state;
    } else {
      return state.text;
    }
  };

  function template(data, container){
    //console.log(data);
    var $element = $(data.element).parent();
    if($element.data('flags') !== undefined){
      var lang = $(data.element).val();
      if(lang == 'en') lang = 'gb';
      var $state = $('<span><span class="flag-icon flag-icon-'+lang+'"></span> ' + data.text + '</span>');
      return $state;
    } else {
      return data.text;
    }
  }

  $('select').select2({
    width: '100%',
    minimumResultsForSearch: 5,
    language: lang,
    templateResult: formatState,
    templateSelection: template
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
