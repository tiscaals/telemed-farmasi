import themeColors from '../constant/theme-constant';

chart() {
    //Line Chart
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
                data: [65, 59, 80, 81, 56, 55, 40]
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
}