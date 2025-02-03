{{-- resources/views/admin/survey_results.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Survey Satisfaction Results</h2>
    <canvas id="surveyChart"></canvas>
</div>

{{-- Chart.js Script --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('surveyChart').getContext('2d');
    const satisfactionData = @json($satisfactionData);

    const surveyChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas'],
            datasets: [{
                label: 'Jumlah Responden',
                data: [
                    satisfactionData.sangat_puas,
                    satisfactionData.puas,
                    satisfactionData.cukup_puas,
                    satisfactionData.tidak_puas,
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection