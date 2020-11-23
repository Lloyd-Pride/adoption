
/**
* Theme: Flacto - Bootstrap 4 Responsive Admin Dashboard
* Author: Coderthemes
* Dashboard
*/

!function($) {
    "use strict";

    var Dashboard1 = function() {
    	this.$realData = []
    };

    //creates Bar chart
    Dashboard1.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.2,
            barColors: lineColors
        });
    },

    //creates line chart
    Dashboard1.prototype.createLineChart = function(element, data, xkey, ykeys, labels, opacity, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Line({
          element: element,
          data: data,
          xkey: xkey,
          ykeys: ykeys,
          labels: labels,
          fillOpacity: opacity,
          pointFillColors: Pfillcolor,
          pointStrokeColors: Pstockcolor,
          behaveLikeLine: true,
          gridLineColor: '#eef0f2',
          hideHover: 'auto',
          resize: true, //defaulted to true
          pointSize: 0,
          lineColors: lineColors
        });
    },

    //creates Donut chart
    Dashboard1.prototype.createDonutChart = function(element, data, colors) {
        Morris.Donut({
            element: element,
            data: data,
            resize: true, //defaulted to true
            colors: colors,
            backgroundColor: '#f5f5f5'
        });
    },
    
    
    Dashboard1.prototype.init = function() {

        //creating bar chart
        var $barData  = [
            { y: '2017', a: 50,  b: 40 },
            { y: '2018', a: 75,  b: 65 },
            { y: '2019', a: 100, b: 90 }
        ];
        this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#57c5a5','#79d1b7']);
       // this.createBarChart('morris-bar-example', $barData, 'y', ['a'], ['Statistics'], ['#57c5a5']);

        //create line chart
        var $data  = [
            { y: '2015', a: 50, b: 35 },
            { y: '2016', a: 75, b: 10 },
            { y: '2017', a: 50, b: 40 },
            { y: '2018', a: 75, b: 50 },
            { y: '2019', a: 100, b: 70 }
          ];
        this.createLineChart('morris-line-example', $data, 'y', ['a','b'], ['Series A','Series B'],['0.9'],['#ffffff'],['#999999'], ['#57c5a5','#9adcc9']);

        //creating donut chart
        var $donutData = [
                {label: "Direct Sales", value: 12},
                {label: "Events", value: 30},
                {label: "Website", value: 20}
            ];
        this.createDonutChart('morris-donut-example', $donutData, ['#57c5a5','#79d1b7',"#9adcc9"]);
    },
    //init
    $.Dashboard1 = new Dashboard1, $.Dashboard1.Constructor = Dashboard1
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.Dashboard1.init();
}(window.jQuery);