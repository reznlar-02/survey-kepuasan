<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagram Kepuasan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 45%;
            margin: 20px auto;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Hasil Survey</h1>
    <div class="container">
        <div class="chart-container">
            <canvas id="kepuasanChart1"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="kepuasanChart2"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="kepuasanChart3"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="kepuasanChart4"></canvas>
        </div>
    </div>

    <script>
        // Data hasil survey untuk beberapa diagram (contoh data statis)
        const surveyData1 = {
            labels: ['Sangat Puas', 'Puas', 'Cukup Puas', 'Kurang Puas', 'Tidak Puas'],
            datasets: [{
                label: 'DIKSPESPA',
                data: [25, 45, 15, 10, 5],
                backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(255, 205, 86, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(153, 102, 255, 0.5)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 205, 86, 1)', 'rgba(255, 99, 132, 1)', 'rgba(153, 102, 255, 1)'],
                borderWidth: 1
            }]
        };

        const surveyData2 = {
            labels: ['Sangat Puas', 'Puas', 'Cukup Puas', 'Kurang Puas', 'Tidak Puas'],
            datasets: [{
                label: 'DIKMATA',
                data: [20, 35, 30, 10, 5],
                backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(255, 205, 86, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(153, 102, 255, 0.5)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 205, 86, 1)', 'rgba(255, 99, 132, 1)', 'rgba(153, 102, 255, 1)'],
                borderWidth: 1
            }]
        };

        const surveyData3 = {
            labels: ['Sangat Puas', 'Puas', 'Cukup Puas', 'Kurang Puas', 'Tidak Puas'],
            datasets: [{
                label: 'DIKLAPA',
                data: [10, 50, 20, 15, 5],
                backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(255, 205, 86, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(153, 102, 255, 0.5)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 205, 86, 1)', 'rgba(255, 99, 132, 1)', 'rgba(153, 102, 255, 1)'],
                borderWidth: 1
            }]
        };

        const surveyData4 = {
            labels: ['Sangat Puas', 'Puas', 'Cukup Puas', 'Kurang Puas', 'Tidak Puas'],
            datasets: [{
                label: 'SESKOAL',
                data: [30, 40, 20, 5, 5],
                backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(255, 205, 86, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(153, 102, 255, 0.5)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 205, 86, 1)', 'rgba(255, 99, 132, 1)', 'rgba(153, 102, 255, 1)'],
                borderWidth: 1
            }]
        };

        // Konfigurasi untuk setiap chart
        const config1 = { type: 'bar', data: surveyData1, options: { responsive: true, scales: { y: { beginAtZero: true, title: { display: true, text: 'Jumlah survey' } } } } };
        const config2 = { type: 'bar', data: surveyData2, options: { responsive: true, scales: { y: { beginAtZero: true, title: { display: true, text: 'Jumlah survey' } } } } };
        const config3 = { type: 'bar', data: surveyData3, options: { responsive: true, scales: { y: { beginAtZero: true, title: { display: true, text: 'Jumlah survey' } } } } };
        const config4 = { type: 'bar', data: surveyData4, options: { responsive: true, scales: { y: { beginAtZero: true, title: { display: true, text: 'Jumlah survey' } } } } };

        // Render charts
        new Chart(document.getElementById('kepuasanChart1'), config1);
        new Chart(document.getElementById('kepuasanChart2'), config2);
        new Chart(document.getElementById('kepuasanChart3'), config3);
        new Chart(document.getElementById('kepuasanChart4'), config4);
    </script>
</body>
</html>