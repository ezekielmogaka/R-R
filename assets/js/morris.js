var Script = function () {

    //morris chart

    $(function () {
      
      Morris.Area({
        element: 'hero-area',
        data: [
          {period: '2011 Monday', Views: 2666},
          {period: '2012 Tuesday', Views: 2778},
          {period: '2013 Wednesday', Views: 4912},
          {period: '2014 Thursday', Views: 3767},
          {period: '2015 Friday', Views: 6810},
          {period: '2016 Saturday', Views: 5670},
          {period: '2017 Sunday', Views: 4820}
          
        ],

          xkey: 'period',
          ykeys: ['Views'],
          labels: ['Views'],
          hideHover: 'auto',
          lineWidth: 1,
          pointSize: 5,
          lineColors: ['#4a8bc2'],
          fillOpacity: 0.5,
          smooth: true
      });

     


      $('.code-example').each(function (index, el) {
        eval($(el).text());
      });
    });

}();



