// //nilai
// var total_xp_course = document.getElementById("total_xp_course").value;
// var total_skor_course = document.getElementById("total_skor_course").value;
// var level_course = document.getElementById("level_course").value;
// anime({
//     targets: ".anime-xp-course input",
//     value: [0, total_xp_course],
//     round: 1,
//     easing: "easeInOutExpo",
// });
// anime({
//     targets: ".anime-skor-course input",
//     value: [0, total_skor_course],
//     round: 1,
//     easing: "easeInOutExpo",
// });
// anime({
//     targets: ".anime-level-course input",
//     value: [0, level_course],
//     round: 1,
//     easing: "easeInOutExpo",
// });

//chart js
var total_mission = document.getElementById("total_mission").value;
var completed_mission = document.getElementById("completed_mission").value;
var ongoing_mission = document.getElementById("ongoing_mission").value;
var data = {
    labels: ["Tantangan selesai", "Tantangan belum selesai"],
    datasets: [{
        data: [completed_mission, ongoing_mission],
        backgroundColor: ["#fec600", "#E8DB84"],
        hoverBackgroundColor: ["#fec600", "#E8DB84"],
    }, ],
};

var promisedDeliveryChart = new Chart(document.getElementById('myChart'), {
    type: 'doughnut',
    data: data,
    options: {
        responsive: true,
        cutoutPercentage: 70,
        legend: {
            display: false
        }
    }
});

Chart.pluginService.register({
    beforeDraw: function(chart) {
        var width = chart.chart.width,
            height = chart.chart.height,
            ctx = chart.chart.ctx;

        ctx.restore();
        var fontSize = (height / 114).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.textBaseline = "middle";
        ctx.fillStyle = "#9351F0";

        var text = completed_mission + "/" + total_mission,
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = height / 2;

        ctx.fillText(text, textX, textY);
        ctx.save();
    }
});