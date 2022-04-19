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
          <button type="button" class="btn btn-primary stig">Blog</button>
        </div>
        <div class="col-md-6">
          <div class="blog-buttion"> <a href="#">Add Your Blog</a> </div>
        </div>
      </div>
    </div>
    <em>
    <div class="card rank-tranking-table">
      <div class="card-body">
        <table class="table mb-0">
          <thead class="table-dark">
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Blog Name</th>
              <th scope="col">Date</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>The complete mobile optimization guide for SEO</td>
              <td>Friday, 15 April 2022</td>
              <td>Active</td>
              <td><a href="#"> <i class="lni lni-pencil-alt"></i> </a></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>The complete mobile optimization guide for SEO</td>
              <td>Friday, 15 April 2022</td>
              <td>Active</td>
              <td><a href="#"> <i class="lni lni-pencil-alt"></i> </a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    </em> </div>
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