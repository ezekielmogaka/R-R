domReady(function() {

    $(document).on('click', '#view_user_reports', function(event) {
        window.location.href = baseUrl + 'purchase/view-user-reports';
    });

    $(document).on('click', '.remove_all_or_clear_cart', function(event) {
        window.location.href = baseUrl + 'purchase/clear-cart/';
    });

    $(document).on('click', '.purchased_page', function(event) {
        window.location.href = baseUrl + 'purchase/account/';
    });





    $(document).on('click', '.remove_for_pay', function(event) {

        var divToRemove = $(this).parent().parent();

        var reportID = divToRemove.find('input[name=report_id]').val();


        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: baseUrl + 'purchase/remove-from-cart',
            data: {
                report_id: reportID
            },
            success: function(response) {
                if (response) {

                    var cartCount = $('#cart_count').html().toString();

                    if ((parseInt(cartCount) - 1) == 0) {

                        window.location.href = baseUrl + 'purchase/show-empty-cart';

                    } else {
                        $('#replace_big_div').html(response);
                        $('#cart_count').html(parseInt(cartCount) - 1);
                        window.location.href = baseUrl + 'purchase/show-cart';

                    }


                }
            }
        });



    });
    $(document).on('click', '#authorize_payment_id', function(event) {
        var timeOfRequest = new Date();
        $(this).html('<img style="margin-left: 15px;margin-right: 20px;margin-bottom: -2px;" class="img-responsive" width="35.5px" height="26px" src="' + baseUrl + 'assets/imgs/loading.gif" alt="loading"/>');

        $(this).addClass('reload-button');
        var btnParent = $(this).parent().parent();

        var totalAmount = btnParent.find('b').html().toString();



        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: baseUrl + 'purchase/request-authorize-code',
            data: {
                report_ids: reportIDs,
                report_prizes: reportPrizes,
                report_discounts: reportDiscounts,
                reports_amount_to_pay: reportsAmountToPay,
                reports_total_amount: reportsTotalAmount,
                time_of_request: timeOfRequest
            },
            success: function(response) {
                if (response) {

                    if (response == true) {

                        var htmlToChange = btnParent;

                        $('.remove_for_pay').addClass('check_button');
                        $('.check_button').removeClass('remove_for_pay');
                        $('.check_button').addClass('btn-success');
                        $('.check_button').removeClass('btn-warning');
                        $('.check_button').html('<i class="fa fa-check"></i> Authorized');


                        htmlToChange.html('<div class="btn-lg btn-block col-md-12"><div class="col-md-4" style="padding-top:6px;font-size:initial;" id="message_before_code">Enter Code Sent to Your Email</div> <div class="col-md-3"><input name="confirm_code_value" type="text" class="form-control" /></div><div class="col-md-5"><button  class="btn btn-md btn-info" id="confirm_code">Submit Code</button> OR <button class="btn btn-success btn-md" id="resend_code">Resend Code</button></div></div>');


                    } else {
                        btnParent.addClass('btn-warning');
                        btnParent.removeClass('btn-primary');
                        btnParent.html('System error occured. Click to retry paying Ksh. ' + totalAmount);

                    }


                }
            }
        });



    });

    $(document).on('click', '#confirm_code', function(event) {

        var btnParent = $(this);
        $(this).html('<img style="margin-left: 15px;margin-right: 20px;margin-bottom: -2px;" class="img-responsive" width="35.5px" height="26px" src="' + baseUrl + 'assets/imgs/loading.gif" alt="loading"/>');

        $(this).addClass('reload-button');

        var htmlToChange = btnParent.parent().parent().parent();


        var timeOfConfirmation = new Date();

        var code = $('input[name=confirm_code_value]').val();
        if ($.trim(code) == "") {
            $('#message_before_code').html('<b style="color:#a94442;">You have not entered any code</b>');
            btnParent.html('Submit Code');
            $(btnParent).removeClass('reload-button');
            return false;
        }


        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: baseUrl + 'purchase/authorize-payment',
            data: {
                report_ids: reportIDs,
                report_prizes: reportPrizes,
                report_discounts: reportDiscounts,
                reports_amount_to_pay: reportsAmountToPay,
                reports_total_amount: reportsTotalAmount,
                time_of_confirmation: timeOfConfirmation,
                code: code
            },
            success: function(response) {

                if (response == false) {

                    $('#message_before_code').html('<b style="color:#a94442;">System Error. Retry</b>');

                } else if (response == true) {

                    htmlToChange.html('<div class="col-md-12" style="text-align:center;color:#6dbb4a;font-size:x-large;font-weight:600;"><i class="fa fa-thumbs-up"> Purchase Authorised</i></div>');
                    $('.check_button').html("Purchased");
                    $('.check_button').addClass('view_button');
                    $('.view_button').removeClass('check_button');
                    $('.view_button').addClass('btn-info');
                    $('.view_button').addClass('purchased_page');
                    $('.view_button').removeClass('btn-success');

                    $('#cart_checkout_count').html("0");
                    $('#cart_count').html("0");
                    return true;





                } else {
                    $('#message_before_code').html('<b style="color:#8a6d3b;">Codes did not Match. Retry</b>');
                    btnParent.html('Submit Code');
                    $(btnParent).removeClass('reload-button');
                    return false;



                }


            }
        });



    });

    $(document).on('click', '#resend_code', function(event) {
        $(this).html('<img style="margin-left: 15px;margin-right: 20px;margin-bottom: -2px;" class="img-responsive" width="35.5px" height="26px" src="' + baseUrl + 'assets/imgs/loading.gif" alt="loading"/>');

        $(this).addClass('reload-button');

        var focusBtn = $(this);

        var timeOfRequest = new Date();

        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: baseUrl + 'purchase/resend-authorize-code',
            data: {
                report_ids: reportIDs,
                report_prizes: reportPrizes,
                report_discounts: reportDiscounts,
                reports_amount_to_pay: reportsAmountToPay,
                reports_total_amount: reportsTotalAmount,
                time_of_request: timeOfRequest,
            },
            success: function(response) {


                if (response == true) {
                    focusBtn.html('Code Resent');
                    focusBtn.removeClass('reload-button');

                    $('#message_before_code').html('<b style="color:#3c763d;">Enter  Resent Code</b>');

                } else {
                    focusBtn.html('Code Resent');
                    focusBtn.removeClass('reload-button');
                    $('#message_before_code').html('<b style="color:#a94442;">System Error. Regenerate</b>');
                }

            }
        });



    });


});

function domReady(f) {
    /in/.test(document.readyState) ? setTimeout('domReady(' + f + ')', 9) : f()
}
