//[Dashboard Javascript]
//Project:	Cross Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)

$(function () {

  'use strict';
  
  // Make the dashboard widgets sortable Using jquery UI
  $('.connectedSortable').sortable({
    placeholder         : 'sort-highlight',
    connectWith         : '.connectedSortable',
    handle              : '.box-header, .nav-tabs',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });
  $('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');

  // jQuery UI sortable for the todo list
  $('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });

  // bootstrap WYSIHTML5 - text editor
  $('.textarea').wysihtml5();

  $('.daterange').daterangepicker({
    ranges   : {
      'Today'       : [moment(), moment()],
      'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month'  : [moment().startOf('month'), moment().endOf('month')],
      'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()
  }, function (start, end) {
    window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });

  /* jQueryKnob */
  $('.knob').knob();

  // jvectormap data
  var visitorsData = {
    US: 398, // USA
    SA: 400, // Saudi Arabia
    CA: 1000, // Canada
    DE: 500, // Germany
    FR: 760, // France
    CN: 300, // China
    AU: 700, // Australia
    BR: 600, // Brazil
    IN: 800, // India
    GB: 320, // Great Britain
    RU: 2000 // Russia
  };
  // World map by jvectormap
  $('#world-map').vectorMap({
    map              : 'world_mill_en',
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial: {
        fill            : '#67757c',
        'fill-opacity'  : 1,
        stroke          : 'none',
        'stroke-width'  : 0,
        'stroke-opacity': 1
      }
    },
    series           : {
      regions: [
        {
          values           : visitorsData,
          scale            : ['#d2d6de', '#b5bbc8'],
          normalizeFunction: 'polynomial'
        }
      ]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != 'undefined')
        el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
    }
  });

	
	
	//-------------
		//- BAR CHART -
		//-------------
		
		// Get context with jQuery - using jQuery's .get() method.
		var barChartCanvas = $('#monthly').get(0).getContext('2d');
		// This will get the first returned node in the jQuery collection.
		var barChart            = new Chart(barChartCanvas);

		var barChartData = {
		  labels  : ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
		  datasets: [
			{
			  label               : 'Electronics',
			  fillColor           : 'rgba(38,198,218,1)',
			  strokeColor         : 'rgba(38,198,218,0)',
			  pointColor          : '#26c6da',
			  pointStrokeColor    : 'rgba(38,198,218,0)',
			  pointHighlightFill  : '#fff',
			  pointHighlightStroke: 'rgba(38,198,218,1)',
			  data                : [5, 4, 3, 7, 5, 10, 3]
			},
			{
			  label               : 'Digital Goods',
			  fillColor           : 'rgba(30,136,229,1)',
			  strokeColor         : 'rgba(30,136,229,0)',
			  pointColor          : 'rgba(30,136,229,0)',
			  pointStrokeColor    : '#1e88e5',
			  pointHighlightFill  : '#fff',
			  pointHighlightStroke: 'rgba(30,136,229,1)',
			  data                : [3, 2, 9, 5, 4, 6, 4]
			}
		  ]
		};
		
		
		var barChartOptions                  = {
		  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
		  scaleBeginAtZero        : true,
		  //Boolean - Whether grid lines are shown across the chart
		  scaleShowGridLines      : true,
		  //String - Colour of the grid lines
		  scaleGridLineColor      : 'rgba(0,0,0,.05)',
		  //Number - Width of the grid lines
		  scaleGridLineWidth      : 1,
		  //Boolean - Whether to show horizontal lines (except X axis)
		  scaleShowHorizontalLines: true,
		  //Boolean - Whether to show vertical lines (except Y axis)
		  scaleShowVerticalLines  : true,
		  //Boolean - If there is a stroke on each bar
		  barShowStroke           : true,
		  //Number - Pixel width of the bar stroke
		  barStrokeWidth          : 2,
		  //Number - Spacing between each of the X value sets
		  barValueSpacing         : 30,
		  //Number - Spacing between data sets within X values
		  barDatasetSpacing       : 1,
		  //String - A legend template
		  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		  //Boolean - whether to make the chart responsive
		  responsive              : true,
		  maintainAspectRatio     : true
		};

		barChartOptions.datasetFill = false,
		barChart.Bar(barChartData, barChartOptions);
	
	
  // Sparkline charts
  var myvalues = [1300, 500, 1920, 927, 831, 1127, 719, 1930, 1221];
  $('#sparkline-1').sparkline(myvalues, {
    type     : 'line',
    lineColor: '#67757c',
    fillColor: '#b5bbc8',
    height   : '50',
    width    : '70'
  });
  myvalues = [715, 319, 620, 342, 662, 990, 730, 467, 559, 340, 881];
  $('#sparkline-2').sparkline(myvalues, {
    type     : 'line',
    lineColor: '#67757c',
    fillColor: '#b5bbc8',
    height   : '50',
    width    : '70'
  });
  myvalues = [88, 49, 22,35, 45, 72, 11, 55, 25, 19, 27];
  $('#sparkline-3').sparkline(myvalues, {
    type     : 'line',
    lineColor: '#67757c',
    fillColor: '#b5bbc8',
    height   : '50',
    width    : '70'
  });

  // The Calender
  $('#calendar').datepicker();

  // SLIMSCROLL FOR CHAT WIDGET
  $('#chat-box').slimScroll({
    height: '325px'
  });

  /* Morris.js Charts */
	
  var line = new Morris.Line({
    element          : 'line-chart',
    resize           : true,
    data             : [
      { y: '2015 Q1', item1: 2800 },
      { y: '2015 Q2', item1: 2500 },
      { y: '2015 Q3', item1: 4200 },
      { y: '2015 Q4', item1: 3900 },
      { y: '2016 Q1', item1: 4589 },
      { y: '2016 Q2', item1: 6489 },
      { y: '2016 Q3', item1: 3548 },
      { y: '2016 Q4', item1: 12589 },
      { y: '2017 Q1', item1: 11025 },
      { y: '2017 Q2', item1: 19540 }
    ],
    xkey             : 'y',
    ykeys            : ['item1'],
    labels           : ['Item 1'],
    lineColors       : ['#26C6DA'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#999',
    gridStrokeWidth  : 0.2,
    pointSize        : 4,
    pointStrokeColors: ['#26C6DA'],
    gridLineColor    : '#999',
    gridTextFamily   : 'Open Sans',
    gridTextSize     : 10
  });

  // Donut Chart
  var donut = new Morris.Donut({
    element  : 'sales-chart',
    resize   : true,
    colors   : ['#1e88e5', '#ffb22b', '#7460ee'],
    data     : [
      { label: 'Online Sales', value: 39 },
      { label: 'In-Store Sales', value: 54 },
      { label: 'Mail-Order Sales', value: 15 }
    ],
    hideHover: 'auto'
  });
 // bar Chart
	Morris.Bar({
        element: 'morris-area-chart1',
        data: [{
            period: '2010',
            Online: 40,
            Store: 50,
            
        }, {
            period: '2011',
            Online: 130,
            Store: 100,
            
        }, {
            period: '2012',
            Online: 30,
            Store: 60,
            
        }, {
            period: '2013',
            Online: 30,
            Store: 200,
            
        }, {
            period: '2014',
            Online: 200,
            Store: 150,
            
        }, {
            period: '2015',
            Online: 105,
            Store: 90,
            
        },
         {
            period: '2016',
            Online: 250,
            Store: 150,
           
        }],
        xkey: 'period',
        ykeys: ['Online', 'Store'],
        labels: ['Online', 'Store'],
        pointSize: 0,
       
        pointStrokeColors:['#745af2', '#06d79c'],
        barColors:['#745af2', '#06d79c'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 0,
        smooth: false,
        hideHover: 'auto',
        lineColors: ['#745af2', '#06d79c'],
        resize: true
        
    });
	
	Morris.Area({
        element: 'morris-area-chart2',
        data: [{
            period: '2010',
            Online: 0,
            Store: 0,
            
        }, {
            period: '2011',
            Online: 30,
            Store: 50,
            
        }, {
            period: '2012',
            Online: 210,
            Store: 160,
            
        }, {
            period: '2013',
            Online: 80,
            Store: 40,
            
        }, {
            period: '2014',
            Online: 210,
            Store: 50,
            
        }, {
            period: '2015',
            Online: 80,
            Store: 190,
            
        },
         {
            period: '2016',
            Online: 150,
            Store: 250,
           
        }],
        xkey: 'period',
        ykeys: ['Online', 'Store'],
        labels: ['Online $', 'Store $'],
        pointSize: 0,
        fillOpacity: 0.9,
        pointStrokeColors:['#398bf7', '#f96868'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 0,
        smooth: false,
        hideHover: 'auto',
        lineColors: ['#398bf7', '#f96868'],
        resize: true
        
    });
	
	
	
	
  // Fix for charts under tabs
  $('.box ul.nav a').on('shown.bs.tab', function () {
    area.redraw();
    donut.redraw();
    line.redraw();
  });

  /* The todo list plugin */
  $('.todo-list').todoList({
    onCheck  : function () {
      window.console.log($(this), 'The element has been checked');
    },
    onUnCheck: function () {
      window.console.log($(this), 'The element has been unchecked');
    }
  });
	

}); // End of use strict
