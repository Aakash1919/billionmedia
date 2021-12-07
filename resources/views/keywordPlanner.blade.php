@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
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
                    <select name="searchType" class="form-select" required>
                        <option value="">Select Type</option>
                        <option value="keyword">Keyword</option>
                        <option value="URL">URL</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mx-sm-3 mb-4">Search Keyword</button>
            </form>
        </div>

        @if(isset($keywordPlanner))
            @php
                print_r($keywordPlanner);
            @endphp
        @endif
    </div>
</div>
@endsection
