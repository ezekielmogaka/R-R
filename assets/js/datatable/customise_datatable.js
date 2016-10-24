domReady(function(){
	$('#datatable1').dataTable( {
                  "aaSorting": [[ 0, "asc" ]]
      } );

	if($('#carttable').length > 0){
		$('#carttable').dataTable( {
                  "aaSorting": [[ 0, "asc" ]],
                  "bPaginate":false
      } );

	}
});
function domReady(f){/in/.test(document.readyState)?setTimeout('domReady('+f+')',9):f()}