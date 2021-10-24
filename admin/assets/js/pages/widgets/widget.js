'use strict';
$(document).ready(function () {
	floatchart();
	initCardChart();
	initCardChart2();
});
$('.assign-style').slimscroll({
	height: '449px',
	size: '5px'
});
$('.media-list').slimscroll({
	height: '405px',
	size: '5px'
});
$('#chat-conversation').slimscroll({
	height: '277px',
	size: '5px'
});
var barChartData = [];
for (var i = 0; i <= 20; i += 1) {
	barChartData.push([i, parseInt(Math.random() * 30)]);
}
Morris.Area({
	element: 'area_chart',
	data: [
		{ w: '2011 Q1', x: 2, y: 0, z: 0 },
		{ w: '2011 Q2', x: 50, y: 15, z: 5 },
		{ w: '2011 Q3', x: 15, y: 50, z: 23 },
		{ w: '2011 Q4', x: 45, y: 12, z: 7 },
		{ w: '2011 Q5', x: 20, y: 32, z: 55 },
		{ w: '2011 Q6', x: 39, y: 67, z: 20 },
		{ w: '2011 Q7', x: 20, y: 9, z: 5 }
	],
	xkey: 'w',
	ykeys: ['x', 'y', 'z'],
	labels: ['X', 'Y', 'Z'],
	pointSize: 0,
	lineWidth: 0,
	resize: true,
	fillOpacity: 0.8,
	behaveLikeLine: true,
	gridLineColor: '#e0e0e0',
	hideHover: 'auto',
	lineColors: ['rgb(97, 97, 97)', 'rgb(0, 206, 209)', 'rgb(255, 117, 142)']
});
Morris.Line({
	element: 'project_line',
	data: [{
		period: '2008',
		iphone: 35,
		ipad: 67,
		itouch: 15
	}, {
		period: '2009',
		iphone: 140,
		ipad: 189,
		itouch: 67
	}, {
		period: '2010',
		iphone: 50,
		ipad: 80,
		itouch: 22
	}, {
		period: '2011',
		iphone: 180,
		ipad: 220,
		itouch: 76
	}, {
		period: '2012',
		iphone: 130,
		ipad: 110,
		itouch: 82
	}, {
		period: '2013',
		iphone: 80,
		ipad: 60,
		itouch: 85
	}, {
		period: '2014',
		iphone: 78,
		ipad: 205,
		itouch: 135
	}, {
		period: '2015',
		iphone: 180,
		ipad: 124,
		itouch: 140
	}, {
		period: '2016',
		iphone: 105,
		ipad: 100,
		itouch: 85
	}, {
		period: '2017',
		iphone: 210,
		ipad: 180,
		itouch: 120
	}],
	xkey: 'period',
	ykeys: ['iphone', 'ipad', 'itouch'],
	labels: ['iPhone', 'iPad', 'iPod Touch'],
	pointSize: 3,
	fillOpacity: 0,
	pointStrokeColors: ['#222222', '#cccccc', '#f96332'],
	behaveLikeLine: true,
	gridLineColor: '#e0e0e0',
	lineWidth: 2,
	hideHover: 'auto',
	lineColors: ['#222222', '#20B2AA', '#f96332'],
	resize: true
});
$("#sparkline1").sparkline(
	[0, 23, 43, 35, 44, 45, 56, 37, 40, 45, 56, 7, 10, 44, 45, 56, 37, 40,
		45, 56, 7, 10], {
		type: 'line',
		width: '100%',
		height: '70',
		lineColor: '#ffffff',
		fillColor: 'transparent',
		lineWidth: 1.5,
		spotRadius: 4,
		spotColor: '#ffffff',
		minSpotColor: '#ffffff',
		maxSpotColor: '#ffffff',
		highlightSpotColor: '#ffffff',
		highlightLineColor: '#ffffff'
	});
$("#sparkline2").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7], {
	type: 'line',
	width: '100%',
	fillColor: '#5fc29d54',
	lineColor: '#ffffff',
	lineWidth: 1,
	spotRadius: 2,
	spotColor: '#ffffff',
	minSpotColor: '#ffffff',
	maxSpotColor: '#ffffff',
	highlightSpotColor: '#ffffff',
	highlightLineColor: '#ffffff',
	height: '70',
});
$('.table-assign-task').slimscroll({
	height: '440px',
	size: '5px'
});
function initCardChart2() {
	//Chart Bar
	$('.chart.chart-bar-2').sparkline(undefined, {
		type: 'bar',
		barColor: '#fff',
		negBarColor: '#fff',
		barWidth: '4px',
		height: '45px'
	});
	$('.chart.chart-bar2').sparkline(undefined, {
		type: 'bar',
		barColor: '#54B253',
		negBarColor: '#000',
		barWidth: '4px',
		height: '65px'
	});

	//Chart Pie
	$('.chart.chart-pie-2').sparkline(undefined, {
		type: 'pie',
		height: '45px',
		sliceColors: ['rgba(255,255,255,0.70)', 'rgba(255,255,255,0.85)', 'rgba(255,255,255,0.95)', 'rgba(255,255,255,1)']
	});

	//Chart Line
	$('.chart.chart-line-2').sparkline(undefined, {
		type: 'line',
		width: '60px',
		height: '45px',
		lineColor: '#fff',
		lineWidth: 1.3,
		fillColor: 'rgba(0,0,0,0)',
		spotColor: 'rgba(255,255,255,0.40)',
		maxSpotColor: 'rgba(255,255,255,0.40)',
		minSpotColor: 'rgba(255,255,255,0.40)',
		spotRadius: 3,
		highlightSpotColor: '#fff'
	});
}
function floatchart() {
	$(function () {
		var e = {
			legend: {
				show: !1
			},
			series: {
				label: "",
				curvedLines: {
					active: !0,
					nrSplinePoints: 20
				}
			},
			tooltip: {
				show: !0,
				content: "x : %x | y : %y"
			},
			grid: {
				hoverable: !0,
				borderWidth: 0,
				labelMargin: 0,
				axisMargin: 0,
				minBorderMargin: 0
			},
			yaxis: {
				min: 0,
				max: 30,
				color: "transparent",
				font: {
					size: 0
				}
			},
			xaxis: {
				color: "transparent",
				font: {
					size: 0
				}
			}
		};
		$.plot($("#graph1"), [{
			data: [[0, 20], [20, 10], [35, 18], [50, 12], [65, 25],
			[75, 10], [90, 20]],
			color: "#fff",
			lines: {
				show: true,
				fill: !0,
				lineWidth: 3
			},
			points: {
				show: true
			},
			curvedLines: {
				apply: true
			}
		}], e), $.plot($("#graph2"), [{
			data: [[0, 10], [20, 20], [35, 18], [50, 25], [65, 12],
			[75, 10], [90, 20]],
			color: "#fff",
			lines: {
				show: true,
				fill: !0,
				lineWidth: 3
			},
			points: {
				show: true
			},
			curvedLines: {
				apply: true
			}
		}], e), $.plot($("#graph3"), [{
			data: [[0, 20], [20, 10], [35, 25], [50, 18], [65, 18],
			[75, 10], [90, 12]],
			color: "#fff",
			lines: {
				show: true,
				fill: !0,
				lineWidth: 3
			},
			points: {
				show: true
			},
			curvedLines: {
				apply: true
			}
		}], e), $.plot($("#graph4"), [{
			data: [[0, 18], [20, 10], [35, 20], [50, 10], [65, 12],
			[75, 25], [90, 20]],
			color: "#fff",
			lines: {
				show: true,
				fill: !0,
				lineWidth: 3
			},
			points: {
				show: true
			},
			curvedLines: {
				apply: true
			}
		}], e)
	})
}
function initCardChart() {


	//Chart Bar
	$('.chart.chart-bar').sparkline([6, 4, 8, 6, 8, 10, 5, 6, 7, 9, 5, 6, 4, 8, 6, 8, 10, 5, 6, 7, 9, 5], {
		type: 'bar',
		barColor: '#FF9800',
		negBarColor: '#fff',
		barWidth: '4px',
		height: '45px'
	});


	//Chart Pie
	$('.chart.chart-pie').sparkline([30, 35, 25, 8], {
		type: 'pie',
		height: '45px',
		sliceColors: ['#65BAF2', '#F39517', '#F44586', '#6ADF42']
	});


	//Chart Line
	$('.chart.chart-line').sparkline([9, 4, 6, 5, 6, 4, 7, 3], {
		type: 'line',
		width: '60px',
		height: '45px',
		lineColor: '#65BAF2',
		lineWidth: 2,
		fillColor: 'rgba(0,0,0,0)',
		spotColor: '#F39517',
		maxSpotColor: '#F39517',
		minSpotColor: '#F39517',
		spotRadius: 3,
		highlightSpotColor: '#F44586'
	});

	// live chart
	var mrefreshinterval = 500; // update display every 500ms
	var lastmousex = -1;
	var lastmousey = -1;
	var lastmousetime;
	var mousetravel = 0;
	var mpoints = [];
	var mpoints_max = 30;
	$('html').on("mousemove", function (e) {
		var mousex = e.pageX;
		var mousey = e.pageY;
		if (lastmousex > -1) {
			mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
		}
		lastmousex = mousex;
		lastmousey = mousey;
	});
	var mdraw = function () {
		var md = new Date();
		var timenow = md.getTime();
		if (lastmousetime && lastmousetime != timenow) {
			var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
			mpoints.push(pps);
			if (mpoints.length > mpoints_max)
				mpoints.splice(0, 1);
			mousetravel = 0;
			$('#liveChart').sparkline(mpoints, {
				width: mpoints.length * 2,
				height: '45px',
				tooltipSuffix: ' pixels per second'
			});
		}
		lastmousetime = timenow;
		setTimeout(mdraw, mrefreshinterval);
	};
	// We could use setInterval instead, but I prefer to do it this way
	setTimeout(mdraw, mrefreshinterval);
}