'use strict';
$(function () {
    initCharts();
    initLineChart();
});
//Charts
function initCharts() {
    $('.chart.chart-bar2').sparkline(undefined, {
        type: 'bar',
        barColor: '#54B253',
        negBarColor: '#000',
        barWidth: '5px',
        height: '67px'
    });
}

function initLineChart() {

    /* Chart data*/
    var chartdata = [{
            name: 'sales',
            type: 'bar',
            data: [11, 14, 8, 16, 11, 13]
        },
        {
            name: 'profit',
            type: 'line',
            smooth: true,
            data: [10, 7, 17, 11, 15],
            symbolSize: 10,
        },
        {
            name: 'growth',
            type: 'bar',
            data: [10, 14, 10, 15, 9, 25]
        }
    ];

    /* Bar chart echartopt1*/
    var chart = document.getElementById('echart_bar_line');
    var barChart = echarts.init(chart);

    var option = {
        grid: {
            top: '6',
            right: '0',
            bottom: '17',
            left: '25',
        },
        xAxis: {
            data: ['2014', '2015', '2016', '2017', '2018'],
            axisLine: {
                lineStyle: {
                    color: '#eaeaea'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#9aa0ac'
            }
        },
        tooltip: {
            show: true,
            showContent: true,
            alwaysShowContent: false,
            triggerOn: 'mousemove',
            trigger: 'axis',
            axisPointer: {
                label: {
                    show: false,
                }
            }

        },
        yAxis: {
            splitLine: {
                lineStyle: {
                    color: '#eaeaea'
                }
            },
            axisLine: {
                lineStyle: {
                    color: '#eaeaea'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#9aa0ac'
            }
        },
        series: chartdata,
        color: ['#9f78ff', '#fa626b', '#32cafe', ]
    };

    barChart.setOption(option);

}