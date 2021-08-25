<div>




    <script>
        document.addEventListener('livewire:load', function () {
        const labels = [
            @foreach   ($data['dates'] as $date)
                "{{$date->created_at}}",
            @endforeach
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: '',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: {{$data['values']}},
            }]
        };
        const config = {
            type: 'line',
            data,
            options: {}
        };
        let myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        myChart.update();
        })
    </script>
    <canvas id="myChart"></canvas>
</div>
