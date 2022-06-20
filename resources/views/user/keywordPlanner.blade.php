@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
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
                            <form action="{{ route('new.keyword-planner-post') }}" method="post" class="keword-from">
                                @csrf
                                <div class="-kewleft-side">
                                    <label>Keyword</label>
                                    <input type="text" required name="keyword" class="form-control" autofocus
                                        placeholder="Keyword">
                                </div>
                                <div class="-kewright-side">
                                    <label>Analysis</label>
                                    <div class="slect-erow">
                                        <select name="action" class="form-control" style="padding-left: 8px;"
                                            placeholder="Similar keywords">
                                            <option value="similar_keywords" selected="">Similar keywords</option>
                                            <option value="questions">Questions</option>
                                            <option value="similar_searches">Related searches</option>
                                            <option value="autocomplete">Auto complete</option>
                                            <option value="related_keywords">Related terms</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="-kewful-side">
                                    <label>Search engine</label>
                                    <input type="text" name="url" list="engines" class="form-control"
                                        placeholder="Google.com">
                                </div>
                                <div class="btn-keyword">
                                    <input class="btn btn-primary form-control" type="submit" value="Keyword Research">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if (isset($keywordResponse))
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Keyword</th>
                                    <th scope="col">Average Monthly Searches</th>
                                    <th scope="col">Competition</th>
                                    <th scope="col">Low Top Of Bid Range</th>
                                    <th scope="col">High Top Of Bid Range</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_array($keywordResponse))
                                    @foreach ($keywordResponse as $key => $value)
                                      
                                        @php
                                            $i = 0;
                                            $search = $value['search_volume'] ?? 0;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $value['keyword'] ?? '' }}</td>
                                            <td>{{ $search ?? '' }}</td>
                                            <td>{{ $value['competition'] ?? '0' }}</td>
                                            <td>{{ $value['low_top_of_page_bid'] ?? '0' }}</td>
                                            <td>${{ $value['high_top_of_page_bid'] ?? '0' }}</td>
                                        </tr>
                                        @php $i++; @endphp
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
