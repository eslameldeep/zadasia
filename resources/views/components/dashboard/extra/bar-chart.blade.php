@props([
    'name' => $name ?? 'Name ',
    'chartName' => $chartName ?? 'chart',
    'yChartName' => $yChartName ?? 'unit',
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

            <div class="chart tab-pane active" id="revenue-chart" >

                <div id="{{ $chartName }}" class="chartjs-render-monitor">
                </div>
            </div>

        </div>
    </div>
</div>

@push('js')
    <script>
        var options = {
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
                type: 'bar',
                height: 350 ,
                toolbar: {
                    show: false,
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },

            xaxis: {
                categories: @json($data->pluck($xAxis)->toArray()) ,
            }
        };

        var chart = new ApexCharts(document.querySelector("#{{ $chartName }}"), options);
        chart.render();
    </script>
@endpush
