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
          <div class="blog-buttion"> <a href="{{route('user.viewBlog')}}">Add Your Blog</a> </div>
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
            @php
                $i=0;
            @endphp
            @forelse ($blogs as $blog)
              <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$blog->title ?? ''}}</td>
                <td>{{date('D, d F Y', strtotime($blog->created_at))}}</td>
                <td>{{isset($blog->status) && $blog->status==1 ? 'Active' : 'Inactive' }}</td>
                <td><a href="{{route('user.viewBlog')}}/{{$blog->id ?? ''}}"> <i class="lni lni-pencil-alt"></i> </a></td>
              </tr>
            @empty
                
            @endforelse
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