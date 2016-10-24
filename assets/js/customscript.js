domReady(function(){

      $(window).load(function() {
          $('[data-zlname = reverse-effect]').mateHover({
              position: 'y-reverse',
              overlayStyle: 'rolling',
              overlayBg: '#fff',
              overlayOpacity: 0.7,
              overlayEasing: 'easeOutCirc',
              rollingPosition: 'top',
              popupEasing: 'easeOutBack',
              popup2Easing: 'easeOutBack'
          });
      });

      $(window).load(function() {
          $('.flexslider').flexslider({
              animation: "slide",
              start: function(slider) {
                  $('body').removeClass('loading');
              }
          });
      });

      //    fancybox
      // jQuery(".fancybox").fancybox();

      // for data table
      


      // for the button to upload files admin edit report
      // variable for toggle 

      toggle_value =0 ;

       $('#checkbox_toggle').change(function(event){
        event.stopPropagation();

        if(toggle_value == 0){    

          $('.toggle_onclick_button').removeClass('hidden');
          toggle_value = 1;

        }else{      

          $('.toggle_onclick_button').addClass('hidden');
          toggle_value = 0;
        }
       });





});

function domReady(f){/in/.test(document.readyState)?setTimeout('domReady('+f+')',9):f()}



