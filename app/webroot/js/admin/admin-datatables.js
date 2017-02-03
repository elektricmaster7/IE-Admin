$(document).ready(function(){

  var onInitComplete = function(settings, json){
    var api = this.api();
    var tableID = settings.sTableId;
    var header = $('div[data-table-id="'+tableID+'"]');
    if(header.length > 0){
      var search_input = header.find('input[data-datatables-search]');
      console.log(header);
      if(search_input.length > 0){
        console.log(search_input);
        search_input.on('keyup', function(){
          var input_value = $(this).val();
          console.log(api.search(input_value));
          api.search(input_value).draw();
        });
      }
    }
  };

  $('.table').DataTable({
    "dom": 'rt<"#datatables-footer.col-xs-12"<"#datatables-information.col-xs-12 col-md-6"i><"#datatables-pagination.col-xs-12 col-md-6 text-right"p>>',
    "paging":   true,
    "ordering": false,
    "info":     true,
    "responsive": true,
    "autoWidth": false,
    //"filter":   false,
    "initComplete" : onInitComplete,
    "language": {
      "url": "/js/datatables/i18n/"+datatables_lang+".json"
    }
  });
});
