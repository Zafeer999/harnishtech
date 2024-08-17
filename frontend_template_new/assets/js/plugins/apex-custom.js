// customer_impression chart
if (document.querySelector(".customer_impression")) {

    var options = {
        series: [{
                name: "Orders",
                type: "area",
                data: [34, 65, 46, 68, 49, 61, 42, 44, 78, 52, 63, 67]
            },
            {
                name: "Earnings",
                type: "bar",
                data: [89.25, 98.58, 68.74, 108.87, 77.54, 84.03, 51.24, 28.57, 92.57, 42.36, 88.51, 36.57]
            },
            {
                name: "Refunds",
                type: "line",
                data: [8, 12, 7, 17, 21, 11, 5, 9, 7, 29, 12, 35]
            }
        ],
        chart: {
            height: 400,
            type: "line",
            toolbar: {
                show: false
            },
            animations: {
                enabled: true,
                easing: "easeinout",
                speed: 800,
            },
        },
        stroke: {
            curve: "straight",
            dashArray: [0, 0, 8],
            width: [2, 0, 2.2]
        },
        fill: {
            opacity: [0.1, 0.9, 1]
        },
        markers: {
            size: [0, 0, 0],
            strokeWidth: 2,
            hover: {
                size: 4
            }
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          
        },
        grid: {
            show: true,
            borderColor: '#F5F6F7',
            xaxis: {
                lines: {
                    show: true,
                },
            },
            yaxis: {
                lines: {
                    show: false,
                },
            },
            padding: {
                top: 0,
                right: -2,
                bottom: 15,
                left: 10
            }
        },
        legend: {
            show: false,
            
        },
        plotOptions: {
            bar: {
                columnWidth: "30%",
                barHeight: "70%"
            }
        },
        colors: ['#FFC861','#0065ff','#00A385'],
        tooltip: {
            shared: true,
            y: [{
                    formatter: function(e) {
                        return e !== undefined ? e.toFixed(0) : e;
                    }
                },
                {
                    formatter: function(e) {
                        return e !== undefined ? "$" + e.toFixed(2) + "k" : e;
                    }
                },
                {
                    formatter: function(e) {
                        return e !== undefined ? e.toFixed(0) + " Sales" : e;
                    }
                },
            ],
        },
        responsive: [
            {
                breakpoint: 1400,
                options: {
                    chart: {
                        height: 280,
                    },
                }
            },
            {
                breakpoint: 400,
                options: {
                    chart: {
                        height: 200,
                    },
                }
            }, 
        ]
    };

    chart = new ApexCharts(document.querySelector(".customer_impression"), options);
    chart.render();
}



if (document.querySelector(".earning_overview_chart")) {

    var options = {
        series: [
            {
              name: 'Total Sales',
              data: [10, 80, 70, 65, 40, 88, 60, 99, 105]
            },
            {
              name: 'Total Expense',
              data: [13, 61, 70, 88, 68, 30, 100, 70, 98]
            },
            {
              name: 'Total Profit',
              data: [9, 38, 35, 52, 49, 70, 38, 22, 148]
            }
          ],
        chart: {
          height:400,
            type: 'line',
            toolbar: {
              show: false
            }
          },
          forecastDataPoints: {
            count: 3
          },
          colors: ['#FFC861', '#00998B', '#5D69F4'],
          stroke: {
            width: 3,
            colors: ['#FFC861', '#00998B', '#5D69F4'],
          },
          xaxis: {
            type: 'category',
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            tickAmount: 9,
            axisTicks: {
              show: false
            },
            axisBorder: {
              show: false
            },
          },
          yaxis: {
            min: 0,
            max: 150,
            tickAmount: 6,
            labels: {
              offsetX: 0
            }
          },
          fill: {
            colors: ['#FFC861', '#00998B', '#5D69F4'],
          },
          markers: {
            colors: ['#fff'],
            width: 8,
            height: 8,
            radius: 50,
            shape: "circle",
            size: 6,
            strokeColors: ['#FFC861', '#00998B', '#5D69F4'],
            hover: {
              size: 8,
            },
          },
          dataLabels: {
            enabled: false,
            enabledOnSeries: undefined,
            textAnchor: 'middle',
            distributed: false,
            offsetX: 0,
            offsetY: 0,
            background: {
              enabled: true,
              foreColor: '#fff',
              padding: 6,
              borderRadius: 20,
              borderWidth: 1,
              borderColor: '#fff',
              opacity: 0.9
            }
          },
          legend: {
            offsetY: 8,
            markers: {
              height: 4,
              width: 4,
              offsetX: -5,
            },
            itemMargin: {
              horizontal: 20,
            },
          },
          grid: {
            borderColor:'#EBECEF',
            padding: {
              bottom: 16,
            }
          },

          responsive: [
            {
                breakpoint: 1400,
                options: {
                    chart: {
                        height: 280,
                    },
                }
            },
            {
                breakpoint: 400,
                options: {
                    chart: {
                        height: 200,
                    },
                }
            }, 
        ]
    };

    chart = new ApexCharts(document.querySelector(".earning_overview_chart"), options);
    chart.render();
}
