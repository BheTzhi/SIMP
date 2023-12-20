$(document).ready(function () {

    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    const dasar = 0;
    const satu = 1;
    const bulan = urlParams.get('bulan');
    const tahun = urlParams.get('tahun');

    const url = 'dashboard/yValues/'
    const urlair = 'dashboard/yValuesAir/'

    $.ajax({
        type: 'post',
        url: url,
        data: {
            bulan: bulan,
            tahun: tahun,
            lantai: dasar
        },
        dataType: 'json',
        success: function (data) {

            if (data.result.length == 1) {
                var lunas = 0
                var belum = data.result[0].status
            } else if (data.status == 0) {
                var lunas = 0
                var belum = 0
            } else {
                var lunas = data.result[1].status
                var belum = data.result[0].status
            }

            var xValues = ["Lunas", "Belum Lunas"];
            var yValues = [lunas, belum]
            var barColors = [
                "#1cc88a",
                "#e74a3b"
            ];
            var hoverColors = [
                "#4e73df",
                "#fd7e14"

            ];

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");

            new Chart(ctx, {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        hoverBackgroundColor: hoverColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                },
            })
        }
    })

    $.ajax({
        type: 'post',
        url: url,
        data: {
            bulan: bulan,
            tahun: tahun,
            lantai: satu
        },
        dataType: 'json',
        success: function (data) {

            if (data.result.length == 1) {
                var lunas = 0
                var belum = data.result[0].status
            } else if (data.status == 0) {
                var lunas = 0
                var belum = 0
            } else {
                var lunas = data.result[1].status
                var belum = data.result[0].status
            }

            var xValues = ["Lunas", "Belum Lunas"];
            var yValues = [lunas, belum]
            var barColors = [
                "#1cc88a",
                "#e74a3b"
            ];
            var hoverColors = [
                "#4e73df",
                "#fd7e14"

            ];

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart1");

            new Chart(ctx, {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        hoverBackgroundColor: hoverColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                },
            })
        }
    })

    $.ajax({
        type: 'post',
        url: urlair,
        data: {
            bulan: bulan,
            tahun: tahun,
            lantai: dasar
        },
        dataType: 'json',
        success: function (data) {

            if (data.result.length == 1) {
                var lunas = 0
                var belum = data.result[0].status
            } else if (data.status == 0) {
                var lunas = 0
                var belum = 0
            } else {
                var lunas = data.result[1].status
                var belum = data.result[0].status
            }

            var xValues = ["Lunas", "Belum Lunas"];
            var yValues = [lunas, belum]
            var barColors = [
                "#1cc88a",
                "#e74a3b"
            ];
            var hoverColors = [
                "#4e73df",
                "#fd7e14"

            ];

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart2");

            new Chart(ctx, {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        hoverBackgroundColor: hoverColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                },
            })
        }
    })

    $.ajax({
        type: 'post',
        url: urlair,
        data: {
            bulan: bulan,
            tahun: tahun,
            lantai: satu
        },
        dataType: 'json',
        success: function (data) {

            if (data.result.length == 1) {
                var lunas = 0
                var belum = data.result[0].status
            } else if (data.status == 0) {
                var lunas = 0
                var belum = 0
            } else {
                var lunas = data.result[1].status
                var belum = data.result[0].status
            }

            var xValues = ["Lunas", "Belum Lunas"];
            var yValues = [lunas, belum]
            var barColors = [
                "#1cc88a",
                "#e74a3b"
            ];
            var hoverColors = [
                "#4e73df",
                "#fd7e14"

            ];

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart3");

            new Chart(ctx, {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        hoverBackgroundColor: hoverColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                },
            })
        }
    })

})

