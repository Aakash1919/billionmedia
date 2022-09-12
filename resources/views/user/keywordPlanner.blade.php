@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            @if (!isset($refreshToken))
                @include('components.Alerts.default', [
                    'attributes' => [
                        'title' => 'Authentication Alets',
                        'message' =>
                            'If you want to access full tools, please connect with google <a href="{{ route(`google-authorize`) }}" class="btn btn-sm btn-primary mb-2">Connect</a>',
                    ],
                ])
            @endif

            <div class="hadder-row">
                <div class="container">
                    <div class="col-md-6"><span>Keyword Research <em><img src="assets/images/right.png"></em></span>
                        <button type="button" class="btn btn-primary stig" data-toggle="modal" data-target="#mb-trk">
                            Settings</button>
                    </div>
                </div>
            </div>

            <div class="keyword-saction-one research-keyword">
                <div class="container">
                    <div class="keyword-box-one">
                        <div class="table-price">
                            @if (session('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="{{ route('keyword-planner-post') }}" method="post" class="keword-from">
                                @csrf
                                <div class="-kewleft-side">
                                    <label>Keyword</label>
                                    <input type="text" required name="keyword" class="form-control" autofocus
                                        placeholder="Keyword" value={{$request->keyword ?? ''}}>
                                </div>
                                <div class="-kewright-side">
                                    <label>Analysis</label>
                                    <div class="slect-erow">
                                        <select name="action" class="form-control" style="padding-left: 8px;"
                                            placeholder="Similar keywords">
                                            <option value="similar_keywords" selected="" {{ isset($requset->action) && $request->action=='similar_keywords' ? 'selected' : ''}}>Similar keywords</option>
                                            <option value="questions" {{ isset($requset->action) && $request->action=='questions' ? 'selected' : ''}}>Questions</option>
                                            <option value="similar_searches" {{ isset($requset->action) && $request->action=='similar_searches' ? 'selected' : ''}}>Related searches</option>
                                            <option value="autocomplete"{{ isset($requset->action) && $request->action=='autocomplete' ? 'selected' : ''}}>Auto complete</option>
                                            <option value="related_keywords"{{ isset($requset->action) && $request->action=='related_keywords' ? 'selected' : ''}}>Related terms</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="-kewful-side">
                                    <label>Location</label>
                                    <select name="location" class="form-control" style="padding-left: 8px;"
                                        placeholder="Similar keywords">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->location_id ?? '' }}"
                                                {{ $country->location_id == 2826 ? 'selected' : '' }}>
                                                {{ $country->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="btn-keyword">
                                    <input class="btn btn-primary form-control" type="submit" value="Keyword Research">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if (isset($keywordResponse['status']) && $keywordResponse['status'] == true)
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Keyword</th>
                                    <th scope="col">Average Monthly Searches</th>
                                    <th scope="col">Competition</th>
                                    <th scope="col">CPC</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($keywordResponse['data']) && is_array($keywordResponse['data']))
                                    @foreach ($keywordResponse['data'] as $key => $value)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $value['keyword'] ?? '' }}</td>
                                            <td>{{ $value['searches'] ?? '' }}</td>
                                            <td>{{ $value['competition'] ?? '' }}</td>
                                            <td>${{ $value['cpc'] ?? '0' }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('javascript')
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
@endpush
