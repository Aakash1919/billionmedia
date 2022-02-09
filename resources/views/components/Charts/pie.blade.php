<div id="pie"></div>
@php
    if(!empty($attributes)) {
        $total = 1;
        foreach ($attributes as $key => $keyword) {
            $total += json_decode($keyword->stats)->data->{0}->searches ?? 0;
        }
    }
    
@endphp
@push('lastScripts')
<script>
    
  Highcharts.chart('pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Monthly Result'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
            @foreach($attributes as $key => $value)
            {
                name: '{{trim($value->keyword)}}',
                y: {{ (json_decode($value->stats)->data->{0}->searches ?? 0) / $total  }}
            },
            @endforeach
            ]
    }]
});
</script>
@endpush