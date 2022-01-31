<div id="line"></div>
@push('lastScripts')
<script>
    Highcharts.chart('line', {
  
      title: {
        text: 'Suave Creators'
      },
  
      yAxis: {
        title: {
          text: 'Position'
        }
      },
  
      xAxis: {
        accessibility: {
          rangeDescription: 'Range: 2010 to 2017'
        }
      },
  
      legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
      },
  
      plotOptions: {
        series: {
          label: {
            connectorAllowed: false
          },
          pointStart: 2010
        }
      },
  
      series: [{
        name: 'Positions',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
      }],
  
      responsive: {
        rules: [{
          condition: {
            maxWidth: 500
          },
          chartOptions: {
            legend: {
              layout: 'horizontal',
              align: 'center',
              verticalAlign: 'bottom'
            }
          }
        }]
      }
  
    });
    </script>
    @endpush