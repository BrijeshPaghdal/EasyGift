'use strict';
$(function () {


	$('#chat-conversation').slimscroll({
		height: '264px',
		size: '5px'
	});
	initCardChart();
	initSparkline();
	initLineChart();
	initSalesChart();

	$.ajax({
	url :"ajax/ajax-get-chart-data.php",
	type : "POST",
	success : function(data){
			var allData = data;
			allData = allData.split('/');
			var Order = allData[0].split(',');
			var product = allData[1].split(',');
			Order.reverse();
			product.reverse();
			initChartReport2(Order,product);
	}
	});
});

function initCardChart() {


	//Chart Bar
	$.ajax({
	url :"ajax/ajax-get-total-chart-data.php",
	type : "POST",
	success : function(data){
			var allData = data;
			allData = allData.split('/');
			var seller = allData[0].split(',');
			var user = allData[1].split(',');
			seller.reverse();
			user.reverse();
			$('#total_user').sparkline(user, {
				type: 'bar',
				barColor: '#FF9800',
				negBarColor: '#fff',
				barWidth: '4px',
				height: '45px'
			});

			$('#total_seller').sparkline(seller	, {
				type: 'bar',
				barColor: '#FF9800',
				negBarColor: '#fff',
				barWidth: '4px',
				height: '45px'
			});
	}
	});
}


function initChartReport2(orders,products) {

	var canvas = document.getElementById("chartReport2");

	var gradientBlue = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientBlue.addColorStop(0, 'rgba(85, 85, 255, 0.9)');
	gradientBlue.addColorStop(1, 'rgba(151, 135, 255, 0.8)');

	var gradientHoverBlue = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientHoverBlue.addColorStop(0, 'rgba(65, 65, 255, 1)');
	gradientHoverBlue.addColorStop(1, 'rgba(131, 125, 255, 1)');

	var gradientRed = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientRed.addColorStop(0, 'rgba(255, 85, 184, 0.9)');
	gradientRed.addColorStop(1, 'rgba(255, 135, 135, 0.8)');

	var gradientHoverRed = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientHoverRed.addColorStop(0, 'rgba(255, 65, 164, 1)');
	gradientHoverRed.addColorStop(1, 'rgba(255, 115, 115, 1)');

	var redArea = null;
	var blueArea = null;

	var shadowed = {
		beforeDatasetsDraw: function (chart, options) {
			chart.ctx.shadowColor = 'rgba(0, 0, 0, 0.25)';
			chart.ctx.shadowBlur = 40;
		},
		afterDatasetsDraw: function (chart, options) {
			chart.ctx.shadowColor = 'rgba(0, 0, 0, 0)';
			chart.ctx.shadowBlur = 0;
		}
	};

	var canvas = document.getElementById("chartReport2");

	var newDate = new Date();
	var dbDate = [];
	newDate.setDate(newDate.getDate() - 6);
	for (var i = 1 ; i <= 7; i++)
	{
			var dd = String(newDate.getDate()).padStart(2, '0');
			var mm = String(newDate.getMonth() + 1).padStart(2, '0');
			var date = dd + '/' + mm;
			dbDate.push(date);
			newDate.setDate(newDate.getDate() + 1);
	}

	var config = {
		type: "radar",
		data: {
			labels: dbDate,
			datasets: [{
				label: "Product",
				data: products,
				fill: true,
				backgroundColor: gradientRed,
				borderColor: 'transparent',
				pointBackgroundColor: "transparent",
				pointBorderColor: "transparent",
				pointHoverBackgroundColor: "transparent",
				pointHoverBorderColor: "transparent",
				pointHitRadius: 50,
			}, {
				label: "Orders",
				data: orders,
				fill: true,
				backgroundColor: gradientBlue,
				borderColor: "transparent",
				pointBackgroundColor: "transparent",
				pointBorderColor: "transparent",
				pointHoverBackgroundColor: "transparent",
				pointHoverBorderColor: "transparent",
				pointHitRadius: 50,
			}]
		},
		options: {
			legend: {
				display: false,
			},
			gridLines: {
				display: false
			},
			scale: {
				ticks: {
					maxTicksLimit: 1,
					display: false,
				},
				xAxes: [{
					display: false,
				}],
				yAxes: [{
					display: false,
					ticks: {
						beginAtZero: true,
					},
				}]
			}
		},
		plugins: [shadowed],
	};
	window.chart = new Chart(canvas, config);
}
function initSparkline() {
	$(".sparkline").each(function () {
		var $this = $(this);
		$this.sparkline('html', $this.data());
	});
}

function initLineChart() {
	try {

		//line chart
		var ctx = document.getElementById("lineChart");
		if (ctx) {
			ctx.height = 150;
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["January", "February", "March", "April", "May", "June", "July"],
					defaultFontFamily: "Poppins",
					datasets: [
						{
							label: "My First dataset",
							borderColor: "rgba(0,0,0,.09)",
							borderWidth: "1",
							backgroundColor: "rgba(0,0,0,.07)",
							data: [22, 44, 67, 43, 76, 45, 12]
						},
						{
							label: "My Second dataset",
							borderColor: "rgba(0, 123, 255, 0.9)",
							borderWidth: "1",
							backgroundColor: "rgba(0, 123, 255, 0.5)",
							pointHighlightStroke: "rgba(26,179,148,1)",
							data: [16, 32, 18, 26, 42, 33, 44]
						}
					]
				},
				options: {
					legend: {
						position: 'top',
						labels: {
							fontFamily: 'Poppins'
						}

					},
					responsive: true,
					tooltips: {
						mode: 'index',
						intersect: false
					},
					hover: {
						mode: 'nearest',
						intersect: true
					},
					scales: {
						xAxes: [{
							ticks: {
								fontFamily: "Poppins"

							}
						}],
						yAxes: [{
							ticks: {
								beginAtZero: true,
								fontFamily: "Poppins"
							}
						}]
					}

				}
			});
		}


	} catch (error) {
		console.log(error);
	}
}

function initSalesChart() {

	try {
		//Sales chart
		var ctx = document.getElementById("sales-chart");
		if (ctx) {
			ctx.height = 150;
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
					type: 'line',
					defaultFontFamily: 'Poppins',
					datasets: [{
						label: "Foods",
						data: [0, 30, 10, 120, 50, 63, 10],
						backgroundColor: 'transparent',
						borderColor: '#222222',
						borderWidth: 2,
						pointStyle: 'circle',
						pointRadius: 3,
						pointBorderColor: 'transparent',
						pointBackgroundColor: '#222222',
					}, {
						label: "Electronics",
						data: [0, 50, 40, 80, 40, 79, 120],
						backgroundColor: 'transparent',
						borderColor: '#f96332',
						borderWidth: 2,
						pointStyle: 'circle',
						pointRadius: 3,
						pointBorderColor: 'transparent',
						pointBackgroundColor: '#f96332',
					}]
				},
				options: {
					responsive: true,
					tooltips: {
						mode: 'index',
						titleFontSize: 12,
						titleFontColor: '#000',
						bodyFontColor: '#000',
						backgroundColor: '#fff',
						titleFontFamily: 'Poppins',
						bodyFontFamily: 'Poppins',
						cornerRadius: 3,
						intersect: false,
					},
					legend: {
						display: false,
						labels: {
							usePointStyle: true,
							fontFamily: 'Poppins',
						},
					},
					scales: {
						xAxes: [{
							display: true,
							gridLines: {
								display: false,
								drawBorder: false
							},
							scaleLabel: {
								display: false,
								labelString: 'Month'
							},
							ticks: {
								fontFamily: "Poppins"
							}
						}],
						yAxes: [{
							display: true,
							gridLines: {
								display: false,
								drawBorder: false
							},
							scaleLabel: {
								display: true,
								labelString: 'Value',
								fontFamily: "Poppins"

							},
							ticks: {
								fontFamily: "Poppins"
							}
						}]
					},
					title: {
						display: false,
						text: 'Normal Legend'
					}
				}
			});
		}


	} catch (error) {
		console.log(error);
	}
}
