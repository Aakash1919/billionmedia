@extends('layouts.app')
@section('content')
<div class="page-wrapper">
  <div class="page-content"> @if (session('status'))
    @include('components.Alerts.default', array('attributes' => array(
    'title' => 'Message',
    'message' => 'Keyword Added Successfully'
    )))
    @endif
    <div class="hadder-row">
      <div class="container">
        <div class="col-md-6"><span>Keyword Research <em><img src="{{asset('assets/images/right.png') }}"></em></span>
          <button type="button" class="btn btn-primary stig">Competitor Tracking</button>
        </div>
        <div class="col-md-6">
          <div class="lt-udt">
            <p>January 11, 2022 13:01 PM</p>
          </div>
        </div>
      </div>
    </div>
    <div class="competitor-page-saction-one">
      <h2>Competitor Tracking</h2>
      <p>Here are the domains that are your competitors</p>
      <div class="float-left"><a href="#">pixxelu.com</a></div>
      <div class="float-right">
        <ul class="list-unstyled">
          <li class="init"><img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.3/flags/4x3/in.svg" style="display: inline-block; width: 1.3333em; height: 1em; vertical-align: middle; margin-top: -3px;"> Hindi - India</li>
          <li class="pocti" data-value="value 1"><img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.3/flags/4x3/in.svg" style="display: inline-block; width: 1.3333em; height: 1em; vertical-align: middle; margin-top: -3px;"> Hindi - India</li>
        </ul>
      </div>
    </div>
    <div class="competitor-page-saction-tow"> 
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>
      <main>
        <div id="bar-chart"></div>
        <h5>Monthly Traffic</h5>
        <div id="line-chart"></div>
      </main>
    </div>
    <div class="competitor-page-saction-tow">
      <div class="left-three">
        <h3>Tracked Competitors <span> 0 out of 2</span></h3>
      </div>
      <div class="right-three"> <a href="#" class="add-competitor">ADD COMPETITORS</a> <a href="#" class="export">Export</a> </div>
      <div class="tbl">
        <table>
          <tr>
            <th><label class="container">
                <input type="checkbox" checked="">
                <span class="checkmark"></span></label></th>
            <th>Contact</th>
            <th>Country</th>
            <th>Country</th>
            <th>Country</th>
            <th>Country</th>
          </tr>
        </table>
        <div height="400" class="sc-bUQzRK fxExc"><img src="/assets/images/no_content.42e65572.svg" class="sc-tsHpd dGgJti"><br>
          You haven't added any competitors to this project. Click on "Add Competitors" above to start tracking your competitors.</div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@push('javascript') 
<script src="{{ asset('assets/plugins/highcharts/js/highcharts.js')}}"></script> 
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script> 
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script> 
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script> 
<script type="text/javascript" src="https://www.google.com/jsapi"></script> 
<script>
    $("ul").on("click", ".init", function() {
    $(this).closest("ul").children('li:not(.init)').toggle();
});

var allOptions = $("ul").children('li:not(.init)');
$("ul").on("click", "li:not(.init)", function() {
    allOptions.removeClass('selected');
    $(this).addClass('selected');
    $("ul").children('.init').html($(this).html());
    allOptions.toggle();
});
</script> 
<script>
    google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawCharts);
function drawCharts() {
  var barData = google.visualization.arrayToDataTable([
    ['Day', 'Page Views', 'Unique Views'],
    ['Sun',  1050,      600],
    ['Mon',  1370,      910],
    ['Tue',  660,       400],
    ['Wed',  1030,      540],
    ['Thu',  1000,      480],
    ['Fri',  1170,      960],
    ['Sat',  660,       320]
  ]);
  // set bar chart options
  var barOptions = {
    focusTarget: 'category',
    backgroundColor: 'transparent',
    colors: ['cornflowerblue', 'tomato'],
    fontName: 'Open Sans',
    chartArea: {
      left: 50,
      top: 10,
      width: '100%',
      height: '70%'
    },
    bar: {
      groupWidth: '80%'
    },
    hAxis: {
      textStyle: {
        fontSize: 11
      }
    },
    vAxis: {
      minValue: 0,
      maxValue: 1500,
      baselineColor: '#DDD',
      gridlines: {
        color: '#DDD',
        count: 4
      },
      textStyle: {
        fontSize: 11
      }
    },
    legend: {
      position: 'bottom',
      textStyle: {
        fontSize: 12
      }
    },
    animation: {
      duration: 1200,
      easing: 'out',
			startup: true
    }
  };
  var barChart = new google.visualization.ColumnChart(document.getElementById('bar-chart'));
  barChart.draw(barData, barOptions);
  function randomNumber(base, step) {
    return Math.floor((Math.random()*step)+base);
  }
  function createData(year, start1, start2, step, offset) {
    var ar = [];
    for (var i = 0; i < 12; i++) {
      ar.push([new Date(year, i), randomNumber(start1, step)+offset, randomNumber(start2, step)+offset]);
    }
    return ar;
  }
  var randomLineData = [
    ['Year', 'Page Views', 'Unique Views']
  ];
  for (var x = 0; x < 7; x++) {
    var newYear = createData(2007+x, 10000, 5000, 4000, 800*Math.pow(x,2));
    for (var n = 0; n < 12; n++) {
      randomLineData.push(newYear.shift());
    }
  }
  var lineData = google.visualization.arrayToDataTable(randomLineData);
  var lineOptions = {
    backgroundColor: 'transparent',
    colors: ['cornflowerblue', 'tomato'],
    fontName: 'Open Sans',
    focusTarget: 'category',
    chartArea: {
      left: 50,
      top: 10,
      width: '100%',
      height: '70%'
    },
    hAxis: {
      textStyle: {
        fontSize: 11
      },
      baselineColor: 'transparent',
      gridlines: {
        color: 'transparent'
      }
    },
    vAxis: {
      minValue: 0,
      maxValue: 50000,
      baselineColor: '#DDD',
      gridlines: {
        color: '#DDD',
        count: 4
      },
      textStyle: {
        fontSize: 11
      }
    },
    legend: {
      position: 'bottom',
      textStyle: {
        fontSize: 12
      }
    },
    animation: {
      duration: 1200,
      easing: 'out',
			startup: true
    }
  };
  var lineChart = new google.visualization.LineChart(document.getElementById('line-chart'));
  lineChart.draw(lineData, lineOptions);
  var pieData = google.visualization.arrayToDataTable([
    ['Country', 'Page Hits'],
    ['USA',      7242],
    ['Canada',   4563],
    ['Mexico',   1345],
    ['Sweden',    946],
    ['Germany',  2150]
  ]);
  // pie chart options
  var pieOptions = {
    backgroundColor: 'transparent',
    pieHole: 0.4,
    colors: [ "cornflowerblue", 
              "olivedrab", 
              "orange", 
              "tomato", 
              "crimson", 
              "purple", 
              "turquoise", 
              "forestgreen", 
              "navy", 
              "gray"],
    pieSliceText: 'value',
    tooltip: {
      text: 'percentage'
    },
    fontName: 'Open Sans',
    chartArea: {
      width: '100%',
      height: '94%'
    },
    legend: {
      textStyle: {
        fontSize: 13
      }
    }
  };
  // draw pie chart
  var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart'));
  pieChart.draw(pieData, pieOptions);
}
</script> 
@endpush