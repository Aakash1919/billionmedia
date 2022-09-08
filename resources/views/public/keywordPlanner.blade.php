@extends('layouts.public')
@section('content')
@php
 $action = isset($request) ? $request->get('action') : '';    
 $keyword = isset($request) ? $request->get('keyword') : '';
 $url = isset($request) ? $request->get('url') : '';
@endphp

<div class="keyword-saction-one research-keyword">
        <div class="keyword-box-one">
       
           
          
            <div class="tab-saction tab-keword">
                <section class="tab-whl-sect">
        <div class="container">
        <h3>Keyword Research</h3>
            <p>You have 2 of 3 checks left today</p>
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
                                    placeholder="Keyword" value= '{{ $keyword ?? '' }}'>
                            </div>
                            <div class="-kewright-side">
                                <label>Analysis</label>
                                <select name="action" class="form-control" style="padding-left: 8px;"
                                    placeholder="Similar keywords">
                                    <option value="similar_keywords" {{ isset($action) && $action == 'similar_keywords' ? 'selected': '' }}>Similar keywords</option>
                                    <option value="questions" {{ isset($action) && $action == 'questions' ? 'selected': '' }}>Questions</option>
                                    <option value="similar_searches" {{ isset($action) && $action == 'similar_searches' ? 'selected': '' }}>Related searches</option>
                                    <option value="autocomplete" {{ isset($action) && $action == 'autocomplete' ? 'selected': '' }}>Auto complete</option>
                                </select>
                            </div>
                            <div class="-kewful-side">
                                <label>Search engine</label>
                                <input type="text" name="url" list="engines" class="form-control"
                                    placeholder="" value='{{ $url ?? '' }}'>
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
            </section>
           @if(isset($keywordResponse))
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
                                        aria-label="CPC: activate to sort column ascending">Low Top Of Page Bid</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Cost per click"
                                        class="text-align-right sorting" tabindex="0" aria-controls="keyword-table"
                                        rowspan="1" colspan="1" style="width: 8%;"
                                        aria-label="CPC: activate to sort column ascending">High Top Of Page Bid</th>
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
                                            style="cursor: not-allowed;">Select all {{ is_array($keywordResponse) ? count($keywordResponse) : 0}} keywords</a></th>
                                    {{-- <th colspan="4">
                                        <div class="keyword-confirm-tooltip"><input type="button"
                                                class="btn btn-success keyword-confirm" value="0 Add keywords"
                                                disabled="disabled" data-original-title="" title=""
                                                style="cursor: not-allowed;"></div>
                                    </th>
                                    <th class="checkbox-all" data-original-title="" title=""
                                        style="cursor: not-allowed;"><input type="checkbox" disabled=""></th> --}}
                                </tr>
                            </thead>
                            {{-- <tfoot id="footer">
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
                            </tfoot> --}}
                            <tbody>
                                @if(is_array($keywordResponse))
                                    @foreach($keywordResponse as $key => $value)
                                        @php 
                                            $i=0; 
                                            $search = $value['search_volume'] ?? 0;
                                        @endphp    
                                            <tr class="{{ $i % 2 == 0 ? 'odd' : 'even'}}">
                                                    <td class=" keyword-td markrow">{{ $value['keyword'] ?? '' }}</td>
                                                    <td class="markrow sorting_1">
                                                        <div class="flex" style="justify-content: space-between;">
                                                            <div class="progress" style="width:85px;margin:5px 0">
                                                                <div class="progress-bar " style="width: 0%;">
                                                                </div>
                                                            </div><span>{{ $search ?? '' }}</span>
                                                        </div>
                                                    </td>
                                                    <td class=" markrow">{{ $value['competition'] ?? '' }}</td>
                                                    <td class=" text-align-right markrow">${{ $value['low_top_of_page_bid'] ?? '0' }}</td>
                                                    <td class=" text-align-right markrow">${{ $value['high_top_of_page_bid'] ?? '0' }}</td>
                                                    <td class=" text-align-center"><button class="btn btn-primary show-childrows">show
                                                            <span class="glyphicon glyphicon-chevron-down"></span></button></td>
                                                    <td class=" markrow check" data-original-title="" title=""
                                                        style="cursor: not-allowed;"><input type="checkbox" value="dharamshala|16"
                                                            disabled="disabled" style="cursor: not-allowed;"></td>
                                                </tr>
                                                @php $i++; @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{-- <div class="dataTables_paginate paging_simple_numbers" id="keyword-table_paginate">
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
                            
                        </div> --}}
                    </div>
                </div>
           
            </div>
            </div>
           
            </div>
   
            
           
            @else
            <div class="keywordplanner-content">
                <section class="keyplan">
                    <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="key-left-box">
                            <h3>Free Keyword Research Tool </h3>
                            <span>Discover new ranking opportunities for your website</span>
                            <p>Our keyword research tool is one of the core features of our service offering. As we’ll explain below, it uses unique crawlers to search the length and
                                 breadth of the internet to provide you with the information you need.</p>
                            <p>Below, we’ll go over some of the basics, like what a keyword generator tool is, how keywords help pages and websites rank in Google, and we’ll reveal more about our own keyword research tool,
                                 which you can start using now for free.</p>
                            <p>If you’d like to dive straight in and use our tool, just click here to sign up for a free account.
                                 No billing information is required! If you have any questions or would like our help, please contact us.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="key-right-box reserach-tol">
                            <img src="{{ asset('assets/images/digital1.jpg') }}">
                        </div>
                    </div>
            </div>        
            </section>

            <section class="keyplan-first">
                    <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="key-right-box reserach-tol ">
                            <img src="{{ asset('assets/images/net1.png') }}">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="key-left-box">
                            <h3>What Is A Keyword In SEO? </h3>
                         
                            <p>A keyword in the world of search engine optimisation (SEO) is a means by which search engines like Google
                                 and Bing learn and understand what your page is about.</p>
                            <p>A keyword (or keyphrase) could be 1 word long, or it could be 5 or more. So don’t be misled
                                 when you read “keyword” and expect to see a singular word.</p>
                            <p>Keywords are now used on all types of websites beyond search engines, such as Amazon and YouTube, 
                                as well as e-commerce sites like Etsy. </p>
                            
                             
                        </div>
                    </div>
            </div>
            </div>
            </section>

            <section class="keyplan-second">
                  <h3>The Different Types Of Keywords</h3>
                                <span>There are also different types of keywords, such as:</span>
                    <div class="container">
                        <div class="diff-key">
                      
                                <ul>
                                <li><div class="focs-keyword">
                                <div class="focs-keyword-img">
                                <img src="{{ asset('assets/images/focs1.png') }}"></div>
                                <div class="focs-keyword-cntnt">
                                <h2>Focus keyword </h2>
                               
                                <p> his is usually the main keyword that you’re aiming to rank  
                                     for on that particular page</p>

</div></div></li>
                                <li><div class="focs-keyword">
                                <div class="focs-keyword-img">
                                <img src="{{ asset('assets/images/seo-Visitors-Growth.png') }}"></div>
                                <div class="focs-keyword-cntnt">
                                <h2>Keyword variations</h2>
                                <p>in addition to your focus keyword,
                                 you can also search for variations of that phrase. For example, if your focus keyword is
                                 “beanie hats”,
                           you could also include in your article variations like “men’s beanie hats” or “beanie hats for women.”</p></div></div></li>
                                <li><div class="focs-keyword">
                                <div class="focs-keyword-img">
                                <img src="{{ asset('assets/images/seo-Google-Analytics.png') }}"></div>
                                <div class="focs-keyword-cntnt">
                                <h2>Related keywords</h2>
                                <p>keywords that relate to your focus keyword but might not contain the words that make up the phrase should also be included. As we’ll see below, these types of keywords are important in giving your article context, which helps search engines better understand what your content is about. For example, if we stick with the “beanie hat” keyword, 
                                related terms could include “woollen cap for men” or “Prada beanie”. </p></div></div></li>
                                <li><div class="focs-keyword">
                                <div class="focs-keyword-img">
                                <img src="{{ asset('assets/images/Industry-Proven-Practices.png') }}"></div>
                                <div class="focs-keyword-cntnt">
                                <h2>Questions </h2>
                               <p> one of the main reasons people use search engines is to find answers to questions that they have. As a result, searches that begin with the likes of who, what, where and how are some of the most popular. 
                                Including these questions in your article and providing answers is a great use of your keyword research.</p></div></div> </li>
                            </ul>
                           
                        </div>

                        <div class="diff-key-img">
                        <img src="{{ asset('assets/images/digi-marktng-rocket-1.png') }}">
            </div>
            <div class="new-diff-cntnt">
            <P>If you’re looking for a keyword search tool that enables you to search for all of these types of terms, why not try out SEO Science for free? Just <a href="#">click here </a>or the link at the top of this page to get started. </p>
            </div>
                    </div>


            </section>

            <section class="web-help-rank">
                <div class="container">
               
                   
                        <div class="key-right-box ft-lft ">
                            <img src="{{ asset('assets/images/case01.jpg') }}">
                        </div>
                    
                   
                        <div class="key-left-box ft-rght ">
                            <h3>How Do Keywords Help Pages And Websites Rank?</h3>
                            <div class="p-cntn-left">
                           <p><strong>01.</strong>So now we know what a keyword is in terms of SEO, how do they help pages and websites rank in search engines? 
                          We know that keywords help search engines understand what our content is about. 
                               Let’s look at how they actually do that.</p>
                               <p><strong>02.</strong>Let’s stick with the beanie hats example. To successfully use that keyword, it would be important to include the phrase “beanie hat” within your article a few times. Each usage of the keyword sends a signal 
                                   to the likes of Google that helps it understand what the content is about. </p>
             <p><strong>03.</strong>When we write content tailored for search engines, it’s important that we don’t just rely on one keyword but rather that we include a bunch of other relevant or related keywords. These terms provide extra context to the article
                                        to help search engine crawlers and bots better understand the content.</P>
                                        <p><strong>04.</strong>For example, you may also include in your article phrases like “woollen beanie hat” or “green beanie hat”, 
                                            or seemingly unrelated phrases like “hat and gloves” or “scarf and hat”. </p>
                                        </div>
                                        <div class="p-cntn-right">
         
    <p><strong>05.</strong>Including a variety of relevant keywords gives your article greater context and increases the chances of your page ranking
                                                 for more than just the keyword “beanie hat.”</p>
             <p><strong>06.</strong>You may also include questions and answers in your article, such as “how to crochet a beanie hat” or “how do you wear a beanie hat?”</p>
             <p><strong>07.</strong>The SEO Science keyword planner can help you with all of these things. It enables you 
                 to make custom lists of relevant and question-based keywords to give your article greater context. </p>
                 <p><strong>08.</strong>You can carry out free keyword research today using our tool by<a href="#"> clicking here</a> or the button at the top of this page.</p>
                        </div>
            </div>
                    </div>
           

            </section>

            <section class="key-srch-tool">
                <div class="container">
             
                            <h3>What Is The SEO Science Keyword Research Tool?</h3>
                            <div class="row">
                    <div class="col-md-6">
                        <div class="proces-img">
                        <img src="{{ asset('assets/images/process_1.jpg') }}">
            </div>
            </div>
            <div class="col-md-6 ">
            <div class="proces-contnet">
                <h2>SEO Science Keyword Research Tool?</h2>
                            <p>The SEO Science keyword research tool has been designed by industry professionals to provide 
                                you with every type of keyword possible</p>
                                <p>It’s been designed to be super user-friendly, so if you’ve never used a keyword finder or generator before, you’ll be in good hands. We also have lots of useful walk-through videos that you can watch,
                                 as well as this video below which shows you all of the features of our keyword research tool:</p>
                                </div></div>
                               
            
            </div>
            </div>
            </section>
                   
            <section class="tol-unique">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="tol-img">
                        <img src="{{ asset('assets/images/features_left.png') }}">
                        <P>While these are our core features, the SEO Science keyword research tool is continuously being worked on and improved.
                                 If you have any feedback you’d like to share,<a href="#"> please click here.</a></p>
                                 <p>And to give the keyword checker a go for free,<a href="#"> please click here.</a></p>
            </div>
            </div>
            <div class="col-md-6">
            <div class="new-boxhome tol-content">
                        <h3>What Makes Our Keyword Research Tool Unique?</h3>
                                <span>Let’s tell you a bit more about why we believe our keyword research tool is unique. </span>
                                <ul>
                                <li>Our tool has been specially designed to provide you with the latest and most relevant question-based keywords on the web. These keyphrases have been taken specifically 
                                    from search engines so you know that people have genuinely been searching for them. </li>
                                <li>You’re able to check Cost Per Click (CPC) values of each keyword, which is ideal if you’re looking for a Google Adwords tool to help with paid advertising campaigns.</li>
                                <li>All keywords have an accurate monthly search volume estimate attached to them, enabling you to work out which search terms are worth pursuing. </li>
                                <li>You can download and export lists of keywords for you to work on offline.</li>
                            </ul>
                         
                        </div>
            </div>
                    </div>
            </div>

            </div>
            </section>
            <section class="keyplan">
                    <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="key-left-box">
                            <h3>We Can Help You Boost Your Website Traffic</h3>    
                                     <p>At SEO Science we’re devoted to helping you improve your website to help you generate more traffic.</p>
                            <p>Our keyword research tool is just the beginning. We also have a rank tracker and site audit feature, both of which you can try for free. And we’re certain that by using all of our services,
                                 your site and its pages will begin to improve and generate more traffic in no time. </p>
                                 <p>Helping you improve your website traffic is just one of things we can do for you. We can also help you convert that traffic into 
                                     leads and new business for your organisation.</p>
                                     <p>To find out more, <a href="#">click here </a>or the button at the top of this page.   </p>  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="key-right-box web-tref">
                            <img src="{{ asset('assets/images/home21.png') }}">
                        </div>
            </div>
                    </div>
            </div>        
            </section>
                 
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
