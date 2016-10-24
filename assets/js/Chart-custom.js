var Script = function () {


    var doughnutData = [
        {
            value: 30,
            color:"#F7464A"
        },
        {
            value : 50,
            color : "#46BFBD"
        }
       
    ];

    var pieData = [
        {
            value: 30,
            color:"#F38630"
        },
        {
            value : 50,
            color : "#E0E4CC"
        },
        {
            value : 100,
            color : "#69D2E7"
        }

    ];

     var barChartData = {
        labels : ["1","2","3"],
        datasets : [
            {
                fillColor : "#58c9f3",
                strokeColor : "rgba(220,220,220,1)",
                data : [65,59,90]
            }
            
        ]

    };

    new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);        
    new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
    new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);


}();