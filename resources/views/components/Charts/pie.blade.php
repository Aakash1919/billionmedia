<div id="pie"></div>
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
        data: [{
            name: 'keyword10',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Keyword1',
            y: 11.84
        }, {
            name: 'Keyword2',
            y: 10.85
        }, {
            name: 'Keyword3',
            y: 4.67
        }, {
            name: 'Keyword4',
            y: 4.18
        }, {
            name: 'Keyword5',
            y: 1.64
        }, {
            name: 'Keyword6',
            y: 1.6
        }, {
            name: 'Keyword7',
            y: 1.2
        }, {
            name: 'Keyword8',
            y: 2.61
        }]
    }]
});
</script>
@endpush