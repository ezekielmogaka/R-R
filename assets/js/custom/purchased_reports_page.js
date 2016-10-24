domReady(function() {

	$(document).on('click','#view_user_reports',function(event){
		window.location.href = baseUrl + 'purchase/view-user-reports';
	});
	$(document).on('click','#cart_checkout',function(event){
		window.location.href = baseUrl + 'purchase';
	});


    $('#datatable1').dataTable({
        "aaSorting": [
            [2, "desc"]
        ],
        "bAutoWidth": false,
        
       
    });



});
function domReady(f) { /in/.test(document.readyState) ? setTimeout('domReady(' + f + ')', 9) : f() }
