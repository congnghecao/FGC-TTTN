// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var dat = $("#pieChiTieu").attr('dat');
var kdat = $("#pieChiTieu").attr('kdat');
var vdat = $("#pieChiTieu").attr('vdat');
// Pie Chart Example
var ctx = document.getElementById("pieChiTieu");
var myPieChiTieu = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Đạt CT", "Không đạt CT","Vượt CT"],
        datasets: [{
            data: [dat, kdat, vdat],
            weight: 10,
            backgroundColor: ['#4E73DF', '#F7464A', '#0BBF26'],
            hoverBackgroundColor: ['#4E73DF', '#F7464A','#0BBF26'],
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

myPieChiTieu.canvas.parentNode.style.height = '100%';
myPieChiTieu.canvas.parentNode.style.width = '100%';