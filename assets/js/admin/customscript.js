domReady(function(){

      // for the button to upload files admin edit report
      // variable for toggle 

      toggle_value =0 ;

      if($('#file_errors').html() !== undefined){
        $('#checkbox_toggle').attr('checked',true);
        $('.toggle_onclick_button').removeClass('hidden');
          $('#reportfile').attr('required','');
          $('#reportfile_sample').attr('required','');
          toggle_value = 1;
       }


       $('#checkbox_toggle').change(function(event){
        event.stopPropagation();

        if(toggle_value == 0){    

          $('.toggle_onclick_button').removeClass('hidden');
          $('#reportfile').attr('required','');
          $('#reportfile_sample').attr('required','');
          toggle_value = 1;

        }else{      

          $('.toggle_onclick_button').addClass('hidden');
          $('#reportfile').removeAttr('required');
          $('#reportfile_sample').removeAttr('required');
          toggle_value = 0;
        }
       });






});

function domReady(f){/in/.test(document.readyState)?setTimeout('domReady('+f+')',9):f()}



