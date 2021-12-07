@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        @if (!isset($refreshToken))
            <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-dark">Authentication Alets</h6>
                        <div class="text-dark">If you want to access full tools, please connect with google <a href="{{ route('google-authorize') }}" class="btn btn-sm btn-primary mb-2">Connect</a></div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-daner border-0 bg-daner alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-dark">Message</h6>
                        <div class="text-dark"> {{ session('status') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Keyword Tool
                </div>
            </div>
            <hr>
            <form class="form-inline" method="post" action="{{ route('keyword-planner-post') }}">
                @csrf
                <div class="form-group mx-sm-3 mb-4">
                    <label for="inputKeyword" class="sr-only">Keyword</label>
                    <input type="text" class="form-control" name="keyword" id="inputKeyword" placeholder="Keyword" required>
                </div>
                <div class="form-group mx-sm-3 mb-4">
                    <label for="inputUrl" class="sr-only">URL</label>
                    <input type="text" class="form-control" name="Url" id="inputUrl" placeholder="Please insert URL if want to check in particular URL else leave blank">
                </div>
                <button type="submit" class="btn btn-primary mx-sm-3 mb-4">Search Keyword</button>
            </form>
        </div>
    
        @if(isset($keywordResponse))
        <div class="card">
    		<div class="card-body">
    			<table class="table mb-0">
    				<thead>
    					<tr>
    						<th scope="col">S.No</th>
    						<th scope="col">Keyword</th>
    						<th scope="col">Average Monthly Searches</th>
    						<th scope="col">Competition</th>
    					</tr>
    				</thead>
    				<tbody>
    				    @foreach($keywordResponse as $key => $value)
    					<tr>
    						<th scope="row">{{$key++}}</th>
    						<td>{{ $value['keyword'] ?? '' }}</td>
    						<td>{{ $value['searches'] ?? '' }}</td>
    						<td>{{ $value['competition'] ?? '' }}</td>
    					</tr>
    					@endforeach
    				</tbody>
    			</table>
    		</div>
    	</div>
        @endif
    </div>
</div>
@endsection
