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
            <p>{{date('M d Y h:i A')}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="competitor-page-saction-one">
      <div class="row">
        <div class="col-sm-8">
          <h2>Competitor Tracking</h2>
          <p>Your competitor analysis is show below</p>
        </div>
        <div class="col-sm-4">
          <div class="float-left"><a href="#">{{$project->website_name ?? ''}}</a></div>
        </div>  
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
        <h3>Common Keywords</h3>
      </div>
      <div class="tbl">
        <div class="card rank-tranking-table">
          <div class="card-body">
            <table class="table mb-0">
              <thead class="table-dark">
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Keyword</th>
                  <th scope="col">Volume</th>
                  <th scope="col">Position</th>
                  <th scope="col">Est. Visits</th>
                  <th scope="col">CPC</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 0; @endphp
                @if(isset($project))
                  @forelse ($project->projectKeywords as $keyword)
                    @foreach ($projectCompetitor->projectKeywords as $competitorKeyword)
                      @if ($keyword->keyword==$competitorKeyword->keyword)
                        <tr>
                          <td>{{++$i}}</td>
                          <td>{{ $keyword->keyword ?? 'N/T' }}</td>
                          <td>{{ json_decode($keyword->stats)->data->{0}->searches ?? '' }}</td>
                          <td>{{ $keyword->current_position ?? 'N/T' }}</td>
                          <td>185,538</td>
                          <td>{{ json_decode($keyword->stats)->data->{0}->cpc ?? '' }}</td>
                        </tr>
                      @endif  
                    @endforeach
                  @empty
                  <tr>
                      <td colspan="6">No Records Found</td>
                  </tr>
              @endforelse
                @endif
              </tbody>
            </table>
          </div>
        </div> 
      </div>
      <div class="left-three">
        <h3>Keyword Gap</h3>
      </div>
      <div class="tbl">
        <div class="card rank-tranking-table">
          <div class="card-body">
            <table class="table mb-0">
              <thead class="table-dark">
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Keyword</th>
                  <th scope="col">Volume</th>
                  <th scope="col">Position</th>
                  <th scope="col">Est. Visits</th>
                  <th scope="col">CPC</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 0; @endphp
                @if(isset($projectCompetitor))
                  @forelse ($projectCompetitor->projectKeywords as $competitorKeyword)
                    @foreach ($project->projectKeywords as $keyword)
                      @if ($keyword->keyword!=$competitorKeyword->keyword)
                        <tr>
                          <td>{{++$i}}</td>
                          <td>{{ $competitorKeyword->keyword ?? 'N/T' }}</td>
                          <td>{{ json_decode($competitorKeyword->stats)->data->{0}->searches ?? '' }}</td>
                          <td>{{ $competitorKeyword->current_position ?? 'N/T' }}</td>
                          <td>185,538</td>
                          <td>{{ json_decode($competitorKeyword->stats)->data->{0}->cpc ?? '' }}</td>
                        </tr>
                        @php break; @endphp
                      @endif  
                    @endforeach
                  @empty
                  <tr>
                      <td colspan="6">No Records Found</td>
                  </tr>
              @endforelse
                @endif              
              </tbody>
            </table>
          </div>
        </div> 
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
{{-- <script>
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
</script>  --}}
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
<script>
  // $(document).ready(function() {
	// 	  $('.nav-toggle').click(function(){
	// 		var collapse_content_selector = $(this).attr('href');
	// 		var toggle_switch = $(this);
	// 		$(collapse_content_selector).toggle(function(){
	// 		  if($(this).css('display')=='none'){
	// 			toggle_switch.html('View All');
	// 		  }else{
	// 			toggle_switch.html('Close All');
	// 		  }
	// 		});
	// 	  });

	// 	});
</script>
@endpush