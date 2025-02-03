<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Jawaban</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
            background-color: #f9f9f9;
        }
        canvas {
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Rekap Jawaban Survey</h1>
    <canvas id="surveyChart"></canvas>
    <script>
        // Contoh data jawaban (ini harus diambil dari server)
        const dataJawaban = {
            questions: ["Pertanyaan 1", "Pertanyaan 2", "Pertanyaan 3"],
            answers: [3, 4, 2] // Contoh nilai rata-rata untuk setiap pertanyaan
        };

        const ctx = document.getElementById('surveyChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dataJawaban.questions,
                datasets: [{
                    label: 'Rata-rata Jawaban',
                    data: dataJawaban.answers,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5
                    }
                }
            }
        });
    </script>
</body>
</html>