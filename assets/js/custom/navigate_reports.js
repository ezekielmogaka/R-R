domReady(function() {

    $('#industry_reports').click(function(event) {
        window.location.href = baseUrl + 'welcome/industry';

    });
    $('#sector_reports').click(function(event) {
        window.location.href = baseUrl + 'welcome/sector';

    });
    $('#corporate_reports').click(function(event) {
        window.location.href = baseUrl + 'welcome/corporate';

    });
    $('#check_out_button').click(function(event) {

        if (($(this).html()).toString().indexOf("fa-check") > -1) {
            window.location.href = baseUrl + 'purchase';

        } else {
            return false;
        }
    });

    $(document).on('click', '.add_to_cart', function(event) {
        var currentFocus = $(this);
        currentFocus.html('<img style="margin-left: 15px;margin-right: 20px;margin-bottom: -2px;" class="img-responsive" width="35.5px" height="26px" src="' + baseUrl + 'assets/imgs/loading.gif" alt="loading"/>');
        currentFocus.addClass('reload-button');
        
        var findParent = $(this).parent();
        var anchor = findParent.find('input[name=encoded_report_id]').val();
        var date = new Date($.now());



        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: baseUrl + 'welcome/add-to-cart',
            data: {
                anchor_element: anchor,
                date_time: date
            },
            success: function(response) {
                if (response) {
                    $('#cart_count').html(response);
                    $('#cart_count_check').html(response);

                    if (response > 0) {
                        $('.btn-check-out').html("<i class='fa fa-check'></i> Check Out");

                    }
                    currentFocus.removeClass('btn-default');
                    currentFocus.removeClass('add_to_cart');
                    currentFocus.removeClass('reload-button');
                    currentFocus.addClass('btn-primary');
                    currentFocus.html('Added to Cart');
                }
            }
        });
    });

});

function domReady(f) {
    /in/.test(document.readyState) ? setTimeout('domReady(' + f + ')', 9) : f()
}
