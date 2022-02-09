@extends('layouts.app')

@section('content')
<div class="page-wrapper">
  <div class="page-content">
    @if (session('status'))
    @include('components.Alerts.default', array('attributes' => array(
        'title' => 'Message',
        'message' => 'Keyword Added Successfully'
        )))
    @endif
    <div class="hadder-row">
      <div class="container">
        <div class="col-md-6"><span>Keyword Research <em><img src="{{asset('assets/images/right.png') }}"></em></span>
          <button type="button" class="btn btn-primary stig"> Settings</button>
        </div>
        <div class="col-md-6">
          <div class="lt-udt">
            <p>January 11, 2022 13:01 PM</p>
          </div>
        </div>
      </div>
    </div>
    <div class="keyword-sact">
      <div class="nortn">
        <div class="container">
          <div class="wor-row">
            <div class="wor-col">
              <div class="rnk-gn">0 <div class="nk-arow"></div>
              </div>
              <div class="wordp">Keywords<br>moved up</div>
            </div>
            <div class="wor-col">
              <div class="rnk-gn">0 <div class="nk-arow dna"></div>
              </div>
              <div class="wordp">Keywords<br>moved up</div>
            </div>
            <div class="wor-col">
              <div class="rnk-gn">0 </div>
              <div class="wordp">Keywords<br>moved up</div>
            </div>
          </div>

          <!---[Grap]--->
          <div class="graps">

            <div class="row">
              <div class="col-md-6">
                @include('components.Charts.line' )
              </div>
              <div class="col-md-6">
                @include('components.Charts.pie', array(
                  'attributes' => $keywordDetail
                ))
              </div>
            </div>
          </div>

          <!---[Grap]--->


          @if(isset($keywordDetail))
          <div class="trc-tlt">TRACKED KEYWORDS <span class="cls">({{ count($keywordDetail) }}/25)</span></div>
          <div class="kesy">
            @if(count($keywordDetail) < 26)
              @include('components.Button.default', array('attributes' => array(
                                    'href' => 'javascript:void(0)',
                                    'id' => 'keyword_btn',
                                    'class' => 'btn btn-primary',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#keywordmodal',
                                    'icon' => 'fas fa-plus-circle',
                                    'title'=> 'Add KeyWord'
                                )))
              @include('components.Modals.default', array('attributes' => array(
                                  'id' => 'keywordmodal',
                                  'title' => 'Add Keyword',
                                  'view' => 'components.forms.singleForm',
                                  'viewParameters' => []
                              )))
            @endif
            {{-- <button type="button" class="btn btn-primary btn-delt"><i class="far fa-trash-alt"></i> DELETE</button>
            <span class="cont-ps">0 of 9 Selected</span> --}}
          </div>
          <table class="table table-xs-responsive table-volsd  table-striped" summary="An example of a responsive table using Bootstrap breakpoints." aria-role="table">
            <thead>
              <tr>
                <th> <div class="form-check"> <input type="checkbox" class="form-check-input" id="exampleCheck1"> </div> </th>
                <th> POSITION </th>
                <th> KEYWORD</th>
                <th>CHANGE </th>
                <th>VOL </th>
                <th>SD </th>
                {{-- <th>URL </th> --}}
                <th> </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($keywordDetail as $keyword)
              <tr class="even">
                <td>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  </div>
                </td>
                <td class="pgn">{{$keyword->current_position ?? 'N/T'}}</td>
                <td class="rk-url"><div class="rk-yellow">{{$keyword->keyword}}</div></td>
                <td class="pgn"> 2 </td>
                <td class="pgn">{{ json_decode($keyword->stats)->data->{0}->searches ?? '' }}</td>
                <td class="ptgn">${{ json_decode($keyword->stats)->data->{0}->cpc ?? '' }}</td>
                <td class="pgnd"> <img src="{{asset('assets/images/pc_grey.svg')}}" alt="#"> </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif
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

@endpush