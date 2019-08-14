// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var vao = $("#myPieChart").attr('lamn');
var ra = $("#myPieChart").attr('nghin');
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Nhân sự đang làm", "Nhân sự nghỉ việc"],
        datasets: [{
            data: [vao, ra],
            weight: 10,
            backgroundColor: ['#4E73DF', '#F7464A'],
            hoverBackgroundColor: ['#4E73DF', '#F7464A'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },

    options: {
        maintainAspectRatio: false,
        responsive: true,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: true,
            caretPadding: 10,
        },
        legend: {
            display: true
        },
        cutoutPercentage: 0,
        animation: {
            animateRotate: true,
            animateScale: true
        }
    },
});

myPieChart.canvas.parentNode.style.height = '100%';
myPieChart.canvas.parentNode.style.width = '100%';