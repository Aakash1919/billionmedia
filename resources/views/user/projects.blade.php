@extends('layouts.app')

@section('content')
<div class="page-wrapper">
  <div class="page-content">
    <div class="hadder-row">
        <div class="container">
          <div class="col-md-6"><span>All Projects <em>
          </div>
          <div class="col-md-6">
            <div class="lt-udt">
              <p>{{ date('F d Y', time())}}</p>
            </div>
          </div>
        </div>
      </div>
    <div class="card rank-tranking-table">
        <div class="card-body">
            @if(isset($projects))
            <table class="table mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">URL</th>
                        <th scope="col">Locations</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i =0; @endphp
                    @foreach ($projects as $item)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $item->website_name ?? ''}}</td>
                        <td>{{ $item->website_url ?? ''}}</td>
                        <td>{{ rtrim($item->location  ?? '', ',') }}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive'}}</td>
                        <td><a href="{{route('rank-tracking-id')}}/{{Crypt::encryptString($item->id)}}"> <i class="lni lni-pencil-alt"></i> </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else 
                No Records Found
            @endif
            
        </div>
    </div>
    </div>
</div>
@endsection
@push('javascript')
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
@endpush