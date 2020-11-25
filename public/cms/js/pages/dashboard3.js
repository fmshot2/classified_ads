//[Dashboard3 Javascript]
//Project:	Cross Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard3 (index3.html)

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
      { y: '2015 Q1', item1: 4800 },
      { y: '2015 Q2', item1: 4500 },
      { y: '2015 Q3', item1: 2200 },
      { y: '2015 Q4', item1: 4900 },
      { y: '2016 Q1', item1: 5989 },
      { y: '2016 Q2', item1: 7889 },
      { y: '2016 Q3', item1: 4548 },
      { y: '2016 Q4', item1: 13589 },
      { y: '2017 Q1', item1: 12525 },
      { y: '2017 Q2', item1: 22040 }
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
