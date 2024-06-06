@props([
    'name' => $name ?? 'Name ',
    'chartName' => $chartName ?? 'chart',
    'yChartName'    => $yChartName ?? 'unit',
    'class' => $class ?? '',
    'value' => $value ?? 'value ',
    'icon' => $icon ?? '',
    'xAxis' => $xAxis ?? [],
    'yAxis' => $yAxis ?? [],
    'data' => $data ?? [],
])

<div class="card" style="position: relative; left: 0px; top: 0px;">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            {{ $name }}
        </h3>

    </div>
    <div class="card-body">
        <div class="tab-content p-0">


            <div id="{{ $chartName }}" class="chartjs-render-monitor">
            </div>

        </div>
    </div>
</div>

@push('js')
    <script>
        let options_{{ $chartName }} = {
            series: [
                @if (is_array($yAxis))
                    @foreach ($yAxis as $key => $axis)
                        {
                            name: "{{ $yChartName[$key] }}",
                            data: @json($data->pluck($axis)->toArray())
                        },
                    @endforeach
                @else
                    {
                        name: "{{ $yChartName }}",
                        data: @json($data->pluck($yAxis)->toArray())
                    }
                @endif
            ],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false,
                }
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                width: 5,
                curve: 'smooth'
            },
            grid: {
                row: {
                    colors: ['#17a2b8 ', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.01
                },
            },
            xaxis: {
                categories: @json($data->pluck($xAxis)->toArray()),
                labels: {
                    formatter: function(value, timestamp) {

                        return new Date(value).toDateString() // The formatter function overrides format property
                    },
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#{{ $chartName }}"), options_{{ $chartName }});
        chart.render();
    </script>
@endpush
