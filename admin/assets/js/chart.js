
$(document).ready(function() {
	include('linegraph.js');
		

	// Bar Chart

	var barChartData = {
		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor: 'rgba(0, 158, 251, 0.5)',
			borderColor: 'rgba(0, 158, 251, 1)',
			borderWidth: 1,
			data: total_bayar
		}, {
			label: 'Dataset 2',
			backgroundColor: 'rgba(255, 188, 53, 0.5)',
			borderColor: 'rgba(255, 188, 53, 1)',
			borderWidth: 1,
			data: [28, 48, 40, 19, 86, 27, 90]
		}]
	};

	var ctx = document.getElementById('bargraph').getContext('2d');
	window.myBar = new Chart(ctx, {
		type: 'bar',
		data: barChartData,
		options: {
			responsive: true,
			legend: {
				display: false,
			}
		}
	});

	// Line Chart

	var lineChartData = {
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets: [{
			label: "My First dataset",
			backgroundColor: "rgba(0, 158, 251, 0.5)",
			data: total_bayar
		}, {
			label: "My Second dataset",
			backgroundColor: "rgba(255, 188, 53, 0.5)",
			fill: true,
			data: [28, 48, 40, 19, 86, 27, 20, 90, 50, 20, 90, 20]
		}]
	};
	
	var linectx = document.getElementById('linegraph').getContext('2d');
	window.myLine = new Chart(linectx, {
		type: 'line',
		data: lineChartData,
		options: {
			responsive: true,
			legend: {
				display: false,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
			}
		}
	});


	//Line Chart 2
	const lineChart = document.getElementById("line-chart");
	const lineCtx = lineChart.getContext('2d');
	lineChart.height = 120;
	const lineConfig = new Chart(lineCtx, {
		type: 'line',
		data: {
		labels: ["January", "February", "March", "April", "May", "June", "July"],
		datasets: [{
				label: 'Series A',
				backgroundColor: themeColors.transparent,
				borderColor: themeColors.blue,
				pointBackgroundColor: themeColors.blue,
				pointBorderColor: themeColors.white,
				pointHoverBackgroundColor: themeColors.blueLight,
				pointHoverBorderColor: themeColors.blueLight,
				data: total_bayar
			},
			{
				label: 'Series B',
				backgroundColor: themeColors.transparent,
				borderColor: themeColors.cyan,
				pointBackgroundColor: themeColors.cyan,
				pointBorderColor: themeColors.white,
				pointHoverBackgroundColor: themeColors.cyanLight,
				pointHoverBorderColor: themeColors.cyanLight,
				data: [28, 48, 40, 19, 86, 27, 90]
			}]
		},
		options: {
			legend: {
				display: false
			},
			scales: {
				xAxes: [{ 
					gridLines: [{
						display: false,
					}],
					ticks: {
						display: true,
						fontColor: themeColors.grayLight,
						fontSize: 13,
						padding: 10
					}
				}],
				yAxes: [{
					gridLines: {
						drawBorder: false,
						drawTicks: false,
						borderDash: [3, 4],
						zeroLineWidth: 1,
						zeroLineBorderDash: [3, 4]  
					},
					ticks: {
						display: true,
						max: 100,                            
						stepSize: 20,
						fontColor: themeColors.grayLight,
						fontSize: 13,
						padding: 10
					}  
				}],
			},
		}
	});

	// Bar Chart 2
	
    barChart();
    
    $(window).resize(function(){
        barChart();
    });
    
    function barChart(){
        $('.bar-chart').find('.item-progress').each(function(){
            var itemProgress = $(this),
            itemProgressWidth = $(this).parent().width() * ($(this).data('percent') / 100);
            itemProgress.css('width', itemProgressWidth);
        });
    };
});