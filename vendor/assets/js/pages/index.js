'use strict';
$(function() {


  $('#chat-conversation').slimscroll({
    height: '264px',
    size: '5px'
  });
  initChart();

});

function getMiniPieChartData() {
  $.ajax({
    url: "ajax/ajax-get-sold-product.php",
    type: "POST",
    success: function(data) {
      var prodName = data;
      var productName = prodName.split(',');
      var prodCount = document.getElementById('pie-chart').innerHTML;
      var productCount = prodCount.split(',');
      for (var i = 0; i < productCount.length; i++) {
        productCount[i] = parseInt(productCount[i]);
      }

      //var chart = document.getElementById('pie-chart');
      $('.chart.chart-pie').sparkline(productCount, {
        type: 'pie',
        height: '45px',
        labels: productName,
        sliceColors: ["#FF0000", "#A1FF0A", "#FFD300", "#BE0AFF", "#DEFF0A", "#FF8700", "#0AEFFF", "#147DF5", "#580AFF", "#0AFF99"]
      });
    }
  });
}

function lineChart() {
  var ordCount = document.getElementById('chart-line').innerHTML;
  var orderCount = ordCount.split(',');
  orderCount = orderCount.reverse();
  for (var i = 0; i < orderCount.length; i++) {
    orderCount[i] = parseInt(orderCount[i]);
  }
  $('.chart.chart-line').sparkline(orderCount, {
    type: 'line',
    width: '60px',
    height: '45px',
    lineColor: '#65BAF2',
    lineWidth: 2,
    fillColor: 'rgba(0,0,0,0)',
    spotColor: '#F39517',
    maxSpotColor: '',
    minSpotColor: '',
    spotRadius: 3,
    highlightSpotColor: '#F44586'
  });

}

function chartBar() {
  var getincome = document.getElementById('chart-bar').innerHTML;
  var income = getincome.split(',');
  income = income.reverse();
  for (var i = 0; i < income.length; i++) {
    income[i] = parseInt(income[i]);
  }
  $('.chart.chart-bar').sparkline(income, {
    type: 'bar',
    barColor: '#FF9800',
    negBarColor: '#fff',
    barWidth: '5px',
    height: '45px'
  });
}

function initChart() {


  getMiniPieChartData();
  lineChart();
  chartBar();

}