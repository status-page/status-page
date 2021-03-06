<div>
    <canvas id="metric-{{ $metric->id }}-{{ time() }}" width="400" height="200"></canvas>
    <script>
        var event{{ $metric->id }} = new Event('refreshJavaScript-{{ $metric->id }}');

        var event{{ $metric->id }}Listener = document.addEventListener('refreshJavaScript-{{ $metric->id }}', () => {
            var ctx = document.getElementById('metric-{{ $metric->id }}-{{ time() }}').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($metricData->labels) !!},
                    datasets: [{
                        label: '{{ $metric->suffix }}',
                        data:  {!! json_encode($metricData->points) !!},
                        backgroundColor: 'rgba(85, 153, 255, 0.2)',
                        borderColor: 'rgba(85, 153, 255, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                stacked: true
                            }
                        }]
                    },
                    elements: {
                        point:{
                            radius: 0.75
                        }
                    }
                }
            });
        })

        document.dispatchEvent(event{{ $metric->id }});
    </script>
</div>
