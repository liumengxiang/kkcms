$(document).ready(function(){
	
	todoList();
	discussionWidget();
	
/* ---------- Datable ---------- */

	$('.datatable').dataTable({
		"sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
		"bPaginate": false,
		"bFilter": false,
		"bLengthChange": false,
		"bInfo": false,		
	});
	
	$('.countries').dataTable({
		"sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
		"bPaginate": false,
		"bFilter": false,
		"bLengthChange": false,
		"bInfo": false,
		// Disable sorting on the first column
		"aoColumnDefs" : [ {
			'bSortable' : false,
			'aTargets' : [ 0 ]
		} ]
	});
	
	

/* ---------- Placeholder Fix for IE ---------- */

	$('input, textarea').placeholder();

/* ---------- Auto Height texarea ---------- */

	$('textarea').autosize();
	
	$('#recent a:first').tab('show');
	$('#recent a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	}); 
	
/*------- Main Calendar -------*/

	$('#external-events div.external-event').each(function() {

		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};
		
		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);
		
		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});
	
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	$('.calendar').fullCalendar({
		header: {
			right: 'next',
			center: 'title',
			left: 'prev'
		},
		defaultView: 'month',
		editable: true,
		events: [
			{
				title: 'All Day Event',
				start: '2014-06-01'
			},
			{
				title: 'Long Event',
				start: '2014-06-07',
				end: '2014-06-10'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2014-06-09 16:00:00'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2014-06-16 16:00:00'
			},
			{
				title: 'Meeting',
				start: '2014-06-12 10:30:00',
				end: '2014-06-12 12:30:00'
			},
			{
				title: 'Lunch',
				start: '2014-06-12 12:00:00'
			},
			{
				title: 'Birthday Party',
				start: '2014-05-10 18:05:00'
			},
			{
				title: 'Click for Google',
				url: 'http://google.com/',
				start: '2014-06-28'
			}
		]
	});
	
	
/*------- Realtime Update Chart -------*/
	
	$(function() {

		 // we use an inline data source in the example, usually data would
	// be fetched from a server
	var data = [], totalPoints = 300;
	function getRandomData() {
		if (data.length > 0)
			data = data.slice(1);

		// do a random walk
		while (data.length < totalPoints) {
			var prev = data.length > 0 ? data[data.length - 1] : 50;
			var y = prev + Math.random() * 10 - 5;
			if (y < 0)
				y = 0;
			if (y > 100)
				y = 100;
			data.push(y);
		}

		// zip the generated y values with the x values
		var res = [];
		for (var i = 0; i < data.length; ++i)
			res.push([i, data[i]])
		return res;
	}

	// setup control widget
	var updateInterval = 30;
	$("#updateInterval").val(updateInterval).change(function () {
		var v = $(this).val();
		if (v && !isNaN(+v)) {
			updateInterval = +v;
			if (updateInterval < 1)
				updateInterval = 1;
			if (updateInterval > 2000)
				updateInterval = 2000;
			$(this).val("" + updateInterval);
		}
	});

	
	if($("#realtime-update").length)
	{
		var options = {
			series: { shadowSize: 1 },
			lines: { fill: true, fillColor: { colors: [ { opacity: 1 }, { opacity: 0.1 } ] }},
			yaxis: { min: 0, max: 100 },
			xaxis: { show: false },
			colors: ["#34495E"],
			grid: {	tickColor: "#EEEEEE",
					borderWidth: 0 
			},
		};
		var plot = $.plot($("#realtime-update"), [ getRandomData() ], options);
		function update() {
			plot.setData([ getRandomData() ]);
			// since the axes don't change, we don't need to call plot.setupGrid()
			plot.draw();
			
			setTimeout(update, updateInterval);
		}

		update();
	}
	
});


/*------- Page View Chart -------*/

	(function () {
	var data = [{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":15,"x":"2012-11-19T00:00:00"},{"y":11,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":10,"x":"2012-11-22T00:00:00"},{"y":1,"x":"2012-11-23T00:00:00"},{"y":6,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"line-dotted","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"cumulative","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"bar","yScale":"linear"}];
	var order = [0, 1, 0, 2],
	  i = 0,
	  xFormat = d3.time.format('%A'),
	  chart = new xChart('line-dotted', data[order[i]], '#chart', {
		axisPaddingTop: 5,
		dataFormatX: function (x) {
		  return new Date(x);
		},
		tickFormatX: function (x) {
		  return xFormat(x);
		},
		timing: 1250
	  }),
	  rotateTimer,
	  toggles = d3.selectAll('.multi button'),
	  t = 3500;

	function updateChart(i) {
	  var d = data[i];
	  chart.setData(d);
	  toggles.classed('toggled', function () {
		return (d3.select(this).attr('data-type') === d.type);
	  });
	  return d;
	}

	toggles.on('click', function (d, i) {
	  clearTimeout(rotateTimer);
	  updateChart(i);
	});

	function rotateChart() {
	  i += 1;
	  i = (i >= order.length) ? 0 : i;
	  var d = updateChart(order[i]);
	  rotateTimer = setTimeout(rotateChart, t);
	}
	rotateTimer = setTimeout(rotateChart, t);
	}());


/*------- Example4 -------*/
	(function () {
		  var tt = document.createElement('div'),
	  leftOffset = -(~~$('html').css('padding-left').replace('px', '') + ~~$('body').css('margin-left').replace('px', '')),
	  topOffset = -32;
	tt.className = 'ex-tooltip';
	document.body.appendChild(tt);

		  var data = {
	  "xScale": "time",
	  "yScale": "linear",
	  "main": [
		{
		  "className": ".pizza",
		  "data": [
			{
			  "x": "2012-11-05",
			  "y": 6
			},
			{
			  "x": "2012-11-06",
			  "y": 6
			},
			{
			  "x": "2012-11-07",
			  "y": 8
			},
			{
			  "x": "2012-11-08",
			  "y": 3
			},
			{
			  "x": "2012-11-09",
			  "y": 4
			},
			{
			  "x": "2012-11-10",
			  "y": 9
			},
			{
			  "x": "2012-11-11",
			  "y": 6
			}
		  ]
		}
	  ]
	};
		  var opts = {
	  "dataFormatX": function (x) { return d3.time.format('%Y-%m-%d').parse(x); },
	  "tickFormatX": function (x) { return d3.time.format('%A')(x); },
	  "mouseover": function (d, i) {
		var pos = $(this).offset();
		$(tt).text(d3.time.format('%A')(d.x) + ': ' + d.y)
		  .css({top: topOffset + pos.top, left: pos.left + leftOffset})
		  .show();
	  },
	  "mouseout": function (x) {
		$(tt).hide();
	  }
	};
		  
		  var myChart = new xChart('line-dotted', data, '#example4', opts);
		  
		}());
	
	
/*------- exampleVis -------*/	
	(function () {
		  var errorBar = {
			enter: function (self, storage, className, data, callbacks) {
			  var insertionPoint = xChart.visutils.getInsertionPoint(9),
				container,
				eData = data.map(function (d) {
				  d.data = d.data.map(function (d) {
					return [{x: d.x, y: d.y - d.e}, {x: d.x, y: d.y}, {x: d.x, y: d.y + d.e}];
				  });
				  return d;
				}),
				paths;

			  container = self._g.selectAll('.errorLine' + className)
				.data(eData, function (d) {
				  return d.className;
				});

			  container.enter().insert('g', insertionPoint)
				.attr('class', function (d, i) {
				  return 'errorLine' + className.replace(/\./g, ' ') + ' color' + i;
				});

			  paths = container.selectAll('path')
				.data(function (d) {
				  return d.data;
				}, function (d) {
				  return d[0].x;
				});

			  paths.enter().insert('path')
				.style('opacity', 0)
				.attr('d', d3.svg.line()
				  .x(function (d) {
					return self.xScale(d.x) + self.xScale.rangeBand() / 2;
				  })
				  .y(function (d) { return self.yScale(d.y); })
				);

			  storage.containers = container;
			  storage.paths = paths;
			},
			update: function (self, storage, timing) {
			  storage.paths.transition().duration(timing)
				.style('opacity', 1)
				.attr('d', d3.svg.line()
				  .x(function (d) {
					return self.xScale(d.x) + self.xScale.rangeBand() / 2;
				  })
				  .y(function (d) { return self.yScale(d.y); })
				);
			},
			exit: function (self, storage, timing) {
			  storage.paths.exit()
				.transition().duration(timing)
				.style('opacity', 0);
			},
			destroy: function (self, storage, timing) {
			  storage.paths.transition().duration(timing)
				.style('opacity', 0)
				.remove();
			}
		  };

		  xChart.setVis('error', errorBar);

		  var data = [{
			  "xScale": "ordinal",
			  "yScale": "linear",
			  "main": [
				{
				  "className": ".errorExample",
				  "data": [
					{
					  "x": "Ponies",
					  "y": 12
					},
					{
					  "x": "Unicorns",
					  "y": 23
					},
					{
					  "x": "Trolls",
					  "y": 1
					}
				  ]
				}
			  ],
			  "comp": [
				{
				  "type": "error",
				  "className": ".comp.errorBar",
				  "data": [
					{
					  "x": "Ponies",
					  "y": 12,
					  "e": 5
					},
					{
					  "x": "Unicorns",
					  "y": 23,
					  "e": 2
					},
					{
					  "x": "Trolls",
					  "y": 1,
					  "e": 1
					}
				  ]
				}
			  ]
			},
			{
			  "xScale": "ordinal",
			  "yScale": "linear",
			  "main": [
				{
				  "className": ".errorExample",
				  "data": [
					{
					  "x": "Ponies",
					  "y": 76
					},
					{
					  "x": "Unicorns",
					  "y": 45
					},
					{
					  "x": "Trolls",
					  "y": 82
					}
				  ]
				}
			  ],
			  "comp": [
				{
				  "type": "error",
				  "className": ".comp.errorBar",
				  "data": [
					{
					  "x": "Ponies",
					  "y": 76,
					  "e": 12
					},
					{
					  "x": "Unicorns",
					  "y": 45,
					  "e": 3
					},
					{
					  "x": "Trolls",
					  "y": 82,
					  "e": 12
					}
				  ]
				}
			  ]
			}
		  ];

		  var myChart = new xChart('bar', data[0], '#exampleVis'),
			i = 0;

		  function timer() {
			setTimeout(function () {
			  timer();
			  i += 1;
			  myChart.setData(data[i % 2]);
			}, 3000);
		  }
		  timer();
		}());
	
/*------- Gauge -------*/
	var opts = {
	  	lines: 11, // The number of lines to draw
	  	angle: 0.03, // The length of each line
	  	lineWidth: 0.43, // The line thickness
	  	pointer: {
	    	length: 0.74, // The radius of the inner circle
	    	strokeWidth: 0.034, // The rotation offset
	    	color: '#484848' // Fill color
	  	},
	  	limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
	  	colorStart: '#f79a0e',   // Colors
	  	colorStop: '#f79a0e',    // just experiment with them
	  	strokeColor: '#f5f5f5',   // to see which ones work best for you
	  	generateGradient: true
	};
	var target = document.getElementById('gauge1'); // your canvas element
	var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
	gauge.maxValue = 2000; // set max gauge value
	gauge.animationSpeed = 40; // set animation speed (32 is default value)
	gauge.set(1800); // set actual value
	
	var opts2 = {
	  	lines: 11, // The number of lines to draw
	  	angle: 0.03, // The length of each line
	  	lineWidth: 0.43, // The line thickness
	  	pointer: {
	    	length: 0.74, // The radius of the inner circle
	    	strokeWidth: 0.034, // The rotation offset
	    	color: '#484848' // Fill color
	  	},
	  	limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
	  	colorStart: '#47a947',   // Colors
	  	colorStop: '#47a947',    // just experiment with them
	  	strokeColor: '#f5f5f5',   // to see which ones work best for you
	  	generateGradient: true
	};
	var target = document.getElementById('gauge2'); // your canvas element
	var gauge = new Gauge(target).setOptions(opts2); // create sexy gauge!
	gauge.maxValue = 2000; // set max gauge value
	gauge.animationSpeed = 80; // set animation speed (32 is default value)
	gauge.set(1500); // set actual value
	
	var opts3 = {
	  	lines: 11, // The number of lines to draw
	  	angle: 0.03, // The length of each line
	  	lineWidth: 0.43, // The line thickness
	  	pointer: {
	    	length: 0.74, // The radius of the inner circle
	    	strokeWidth: 0.034, // The rotation offset
	    	color: '#484848' // Fill color
	  	},
	  	limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
	  	colorStart: '#f33d2c',   // Colors
	  	colorStop: '#f33d2c',    // just experiment with them
	  	strokeColor: '#f5f5f5',   // to see which ones work best for you
	  	generateGradient: true
	};
	var target = document.getElementById('gauge3'); // your canvas element
	var gauge = new Gauge(target).setOptions(opts3); // create sexy gauge!
	gauge.maxValue = 2000; // set max gauge value
	gauge.animationSpeed = 80; // set animation speed (32 is default value)
	gauge.set(1200); // set actual value
	
});


