@extends('layouts.public')
@section('content')

<div class="keyword-saction-one research-keyword">
    <div class="container">
        <div class="keyword-box-one">
            <h3>Keyword Research</h3>
            <p>You have 2 of 3 checks left today</p>
            <div class="tab-saction tab-keword">
                <ul class="tabs">
                    <li class="tab-link current" data-tab="tab-1">Related keywords</li>
                    <li class="tab-link" data-tab="tab-2">URL / Domain</li>
                    <li class="tab-link" data-tab="tab-3">Competitor analysis</li>
                </ul>
                <div id="tab-1" class="tab-content current">
                    <div class="table-price">
                        <form class="keword-from"  method="post" action="{{ route('public.keyword-planner-post') }}">
                            @csrf
                            <div class="-kewleft-side">
                                <label>Keyword</label>
                                <input type="text" required name="keyword" class="form-control" autofocus
                                    placeholder="Keyword">
                            </div>
                            <div class="-kewright-side">
                                <label>Analysis</label>
                                <select name="action" class="form-control" style="padding-left: 8px;"
                                    placeholder="Similar keywords">
                                    <option value="similar_keywords" selected="">Similar keywords</option>
                                    <option value="questions">Questions</option>
                                    <option value="similar_searches">Related searches</option>
                                    <option value="autocomplete">Auto complete</option>
                                </select>
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
                <div id="tab-2" class="tab-content">
                    <div class="table-price">
                        <form class="keword-from">
                            <div class="-kewful-side url-domain">
                                <label>URL / Domain</label>
                                <input class="form-control seocheckurlinput" type="text" required name="url"
                                    placeholder="example.com" autofocus>
                            </div>
                            <div class="-kewful-side url-domain">
                                <label>Search engine </label>
                                <input type="text" name="searchengine" list="engines" class="form-control"
                                    placeholder="Google.com">
                            </div>
                            <div class="btn-keyword">
                                <input class="btn btn-primary form-control" type="submit" value="Keyword Research">
                            </div>
                        </form>
                    </div>
                </div>
                <div id="tab-3" class="tab-content">
                    <div class="table-price">
                        <form class="keword-from">
                            <div class="-kewful-side">
                                <label>Your domain</label>
                                <input class="form-control seocheckurlinput" type="text" required name="comparedomain"
                                    placeholder="example.com">
                            </div>
                            <div class="-kewleft-side">
                                <label>Domain A </label>
                                <input class="form-control seocheckurlinput" type="text" required name="domainA"
                                    placeholder="example.com">
                            </div>
                            <div class="-kewright-side">
                                <label>Domain B </label>
                                <input class="form-control seocheckurlinput" type="text" required name="domainA"
                                    placeholder="example.com">
                            </div>
                            <div class="-kewleft-side analysis">
                                <label>Search engine</label>
                                <input class="form-control seocheckurlinput" type="text" required name="domainA"
                                    placeholder="example.com">
                            </div>
                            <div class="-kewright-side analysis">
                                <label>Analysis</label>
                                <div class="flex">
                                    <li class="switcher active">
                                        <label class="flex clear-margin">
                                            <a><input type="radio" name="mode" value="gap"
                                                    checked=""></a>&nbsp;Gap</label>
                                    </li>
                                    <li class="switcher" style="margin-left: 40px;">
                                        <label class="flex clear-margin">
                                            <a><input type="radio" name="mode"
                                                    value="intersect"></a>&nbsp;Intersections</label>
                                    </li>
                                </div>
                            </div>
                            <div class="btn-keyword">
                                <input class="btn btn-primary form-control" type="submit" value="Keyword Research">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

           @if(isset($keywordResponse['status']) && $keywordResponse['status']==true)
            <div class="tblliul">
                <ul>
                    <li class="active"><a href="#">Similar keywords</a></li>
                    <li><a href="#">Questions</a></li>
                    <li><a href="#">Related searches</a></li>
                    <li><a href="#">Auto complete</a></li>
                    <li><a href="#">Related terms</a></li>
                </ul>
            </div>

            <div class="tab-saction tablle">
                <div id="tablecontainer">
                    <div id="keyword-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="top">
                            <div class="flex">
                                <div class="dt-buttons btn-group"> <button class="btn btn-default" tabindex="0"
                                        aria-controls="keyword-table" type="button" id="filter" data-original-title=""
                                        title=""><span><span class="glyphicon glyphicon-filter"
                                                aria-hidden="true"></span> Filter
                                            <span class="glyphicon glyphicon-chevron-down"></span></span></button>
                                </div>
                                <div id="keyword-table_filter" class="dataTables_filter"><label><input type="search"
                                            class="form-control" placeholder="Search"
                                            aria-controls="keyword-table"></label></div>
                            </div>
                            <div class="functions">
                                <div class="dataTables_length" id="keyword-table_length"><label><span id="pagechange"
                                            style="display: none;"><svg
                                                class="svg-inline--fa fa-circle-notch fa-w-16 fast-spin"
                                                style="font-size: 14px;" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="circle-notch" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M288 39.056v16.659c0 10.804 7.281 20.159 17.686 23.066C383.204 100.434 440 171.518 440 256c0 101.689-82.295 184-184 184-101.689 0-184-82.295-184-184 0-84.47 56.786-155.564 134.312-177.219C216.719 75.874 224 66.517 224 55.712V39.064c0-15.709-14.834-27.153-30.046-23.234C86.603 43.482 7.394 141.206 8.003 257.332c.72 137.052 111.477 246.956 248.531 246.667C393.255 503.711 504 392.788 504 256c0-115.633-79.14-212.779-186.211-240.236C302.678 11.889 288 23.456 288 39.056z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fas fa-circle-notch fast-spin" style="font-size: 14px;"></i> Font Awesome fontawesome.com --></span>
                                        Keywords per page: <select name="keyword-table_length"
                                            aria-controls="keyword-table" class="form-control input-sm">
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="250">250</option>
                                            <option value="-1">All</option>
                                        </select></label><button class="btn btn-default buttons-csv buttons-html5"
                                        tabindex="0" aria-controls="keyword-table" type="button"
                                        id="csv-export"><span>CSV Export <span
                                                class="glyphicon glyphicon-disk-save"></span></span></button></div>
                            </div>
                        </div>
                        <table id="keyword-table" class="table table-striped dataTable" style="width:100%" role="grid">
                            <thead id="header">
                                <tr role="row">
                                    <th data-toggle="tooltip" data-placement="top" title="Keyword suggestions"
                                        class="keyword-td sorting" tabindex="0" aria-controls="keyword-table"
                                        rowspan="1" colspan="1" style="width: 45%;"
                                        aria-label="Keywords: activate to sort column ascending">Keywords</th>
                                    <th data-toggle="tooltip" data-placement="top"
                                        title="Average number of searches per month" class="sorting sorting_desc"
                                        tabindex="0" aria-controls="keyword-table" rowspan="1" colspan="1"
                                        style="width: 20%;" aria-sort="descending"
                                        aria-label="Search volume: activate to sort column ascending">Search volume
                                    </th>
                                    <th data-toggle="tooltip" data-placement="top"
                                        title="How strong is the competition (Google Ads)" class="sorting" tabindex="0"
                                        aria-controls="keyword-table" rowspan="1" colspan="1" style="width: 10%;"
                                        aria-label="Comp.: activate to sort column ascending">
                                        Comp.</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Cost per click"
                                        class="text-align-right sorting" tabindex="0" aria-controls="keyword-table"
                                        rowspan="1" colspan="1" style="width: 8%;"
                                        aria-label="CPC: activate to sort column ascending">CPC</th>
                                    <th data-toggle="tooltip" data-placement="top"
                                        title="Top10 search results for the respective keyword"
                                        class="text-align-center sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Top10">Top10</th>
                                    <th class="check sorting_disabled" rowspan="1" colspan="1" aria-label=""
                                        data-original-title="" title="" style="cursor: not-allowed;"><span
                                            class="glyphicon glyphicon-check"></span></th>
                                </tr>
                                <tr class="subheader">
                                    <th colspan="1"><a id="link-check-all" data-original-title="" title=""
                                            style="cursor: not-allowed;">Select all {{count($keywordResponse) ?? 0}} keywords</a></th>
                                    <th colspan="4">
                                        <div class="keyword-confirm-tooltip"><input type="button"
                                                class="btn btn-success keyword-confirm" value="0 Add keywords"
                                                disabled="disabled" data-original-title="" title=""
                                                style="cursor: not-allowed;"></div>
                                    </th>
                                    <th class="checkbox-all" data-original-title="" title=""
                                        style="cursor: not-allowed;"><input type="checkbox" disabled=""></th>
                                </tr>
                            </thead>
                            <tfoot id="footer">
                                <tr class="subheader">
                                    <th colspan="5" style="text-align: right;"
                                        class="keyword-td text-align-right text-align-center" rowspan="1">
                                        <div class="keyword-confirm-tooltip">
                                            <input type="button" class="btn btn-success keyword-confirm"
                                                value="0 Add keywords" disabled="disabled" data-original-title=""
                                                title="" style="cursor: not-allowed;">
                                        </div>
                                    </th>
                                    <th class="checkbox-all" rowspan="1" colspan="1" data-original-title="" title=""
                                        style="cursor: not-allowed;"><input type="checkbox" disabled=""></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(isset($keywordResponse['data']) && is_array($keywordResponse['data']))
                                    @foreach($keywordResponse['data'] as $key => $value)
                                        <tr class="{{ $key % 2 == 0 ? 'odd' : 'even'}}">
                                            <td class=" keyword-td markrow">{{ $value['keyword'] ?? '' }}</td>
                                            <td class="markrow sorting_1">
                                                <div class="flex" style="justify-content: space-between;">
                                                    <div class="progress" style="width:85px;margin:5px 0">
                                                        <div class="progress-bar " style="width: 61%;">
                                                        </div>
                                                    </div><span>{{ $value['searches'] ?? '' }}</span>
                                                </div>
                                            </td>
                                            <td class=" markrow">{{ $value['competition'] ?? '' }}</td>
                                            <td class=" text-align-right markrow">${{ $value['cpc'] ?? '0' }}</td>
                                            <td class=" text-align-center"><button class="btn btn-primary show-childrows">show
                                                    <span class="glyphicon glyphicon-chevron-down"></span></button></td>
                                            <td class=" markrow check" data-original-title="" title=""
                                                style="cursor: not-allowed;"><input type="checkbox" value="dharamshala|16"
                                                    disabled="disabled" style="cursor: not-allowed;"></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers" id="keyword-table_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" id="keyword-table_previous"><a href="#"
                                        aria-controls="keyword-table" data-dt-idx="0" tabindex="0">«</a>
                                </li>
                                <li class="paginate_button active"><a href="#" aria-controls="keyword-table"
                                        data-dt-idx="1" tabindex="0">1</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="keyword-table" data-dt-idx="2"
                                        tabindex="0">2</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="keyword-table" data-dt-idx="3"
                                        tabindex="0">3</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="keyword-table" data-dt-idx="4"
                                        tabindex="0">4</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="keyword-table" data-dt-idx="5"
                                        tabindex="0">5</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="keyword-table" data-dt-idx="6"
                                        tabindex="0">6</a></li>
                                <li class="paginate_button next" id="keyword-table_next"><a href="#"
                                        aria-controls="keyword-table" data-dt-idx="7" tabindex="0">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="content-box-kewod">
                <div class="row">
                    <div class="col-md-6">
                        <div class="content-box-inrr">
                            <h3>Free Keyword Research Tool </h3>
                            <span>Discover new ranking opportunities for your website</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-box-inrr">
                            <img src="{{ asset('assets/front/images/keyword-research-tool-1.png') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-box-inrr">
                            <img src="{{ asset('assets/front/images/keyword-research-tool-1.png') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-box-inrr">
                            <h3>Create your own keyword set using a wide range of filter options </h3>
                            <span>Add the keywords to your Seobility project with just one click</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="content-box-inrr">
                            <h3>What’s the difference between the Keyword Research Tool and Google's Keyword
                                Planner? </h3>
                            <span>The Keyword Research Tool helps you analyze organic search results</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="content-box-inrr key-list">
                            <h3>Keyword research based on a target keyword </h3>
                            <span>The Keyword Research Tool helps you analyze organic search results</span>
                            <ul>
                                <li><strong>Lorem</strong> Ipsum is simply dummy text of the printing and
                                    typesetting</li>
                                <li><strong>Lorem</strong> Ipsum is simply dummy text of the printing and
                                    typesetting</li>
                                <li><strong>Lorem</strong> Ipsum is simply dummy text of the printing and
                                    typesetting</li>
                                <li><strong>Lorem</strong> Ipsum is simply dummy text of the printing and
                                    typesetting</li>
                                <li><strong>Lorem</strong> Ipsum is simply dummy text of the printing and
                                    typesetting</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="content-box-inrr">
                            <h3>Competitor Keyword Research</h3>
                            <span>The Keyword Research Tool helps you analyze organic search results</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {

        $('ul.tabs li').click(function () {
            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');

            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })

    })
</script>
@endpush
@endsection