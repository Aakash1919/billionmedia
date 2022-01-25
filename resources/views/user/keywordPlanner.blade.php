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

<div class="hadder-row">
<div class="container">  
<div class="col-md-6"><span>Keyword Research <em><img src="assets/images/right.png"></em></span> 
<button type="button" class="btn btn-primary stig" data-toggle="modal" data-target="#mb-trk">
Settings</button></div>
<div class="col-md-6">
<div class="lt-udt">
<p>You have 2 of 3 checks left today</p></div> </div>
</div>
</div>

  <div class="keyword-saction-one research-keyword">
  <div class="container">
    <div class="keyword-box-one">
      <div class="tab-saction tab-keword">
        <div id="tab-1" class="tab-content current">
          <div class="table-price">
            <form class="keword-from">
              <div class="-kewleft-side">
                <label>Keyword</label>
                <input type="text" required name="keyword" class="form-control" autofocus placeholder="Keyword">
              </div>
              <div class="-kewright-side">
                <label>Analysis</label>
                <div class="slect-erow">
                <select name="action" class="form-control" style="padding-left: 8px;" placeholder="Similar keywords">
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
                <input type="text" name="searchengine" list="engines" class="form-control" placeholder="Google.com">
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
                <input class="form-control seocheckurlinput" type="text" required name="url" placeholder="example.com" autofocus>
              </div>
              <div class="-kewful-side url-domain">
                <label>Search engine </label>
                <input type="text" name="searchengine" list="engines" class="form-control" placeholder="Google.com">
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
                <input class="form-control seocheckurlinput" type="text" required name="comparedomain" placeholder="example.com">
              </div>
              <div class="-kewleft-side">
                <label>Domain A </label>
                <input class="form-control seocheckurlinput" type="text" required name="domainA" placeholder="example.com">
              </div>
              <div class="-kewright-side">
                <label>Domain B </label>
                <input class="form-control seocheckurlinput" type="text" required name="domainA" placeholder="example.com">
              </div>
              <div class="-kewleft-side analysis">
                <label>Search engine</label>
                <input class="form-control seocheckurlinput" type="text" required name="domainA" placeholder="example.com">
              </div>
              <div class="-kewright-side analysis">
                <label>Analysis</label>
                <div class="flex">
                  <li class="switcher active">
                    <label class="flex clear-margin"> <a>
                      <input type="radio" name="mode" value="gap" checked="">
                      </a>&nbsp;Gap</label>
                  </li>
                  <li class="switcher" style="margin-left: 40px;">
                    <label class="flex clear-margin"> <a>
                      <input type="radio" name="mode" value="intersect">
                      </a>&nbsp;Intersections</label>
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
    </div>
  </div>
</div>
    
        @if(isset($keywordResponse['status']) && $keywordResponse['status']==true)
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
    				    @if(isset($keywordResponse['data']) && is_array($keywordResponse['data']))
        				    @foreach($keywordResponse['data'] as $key => $value)
        					<tr>
        						<th scope="row">{{++$key}}</th>
        						<td>{{ $value['keyword'] ?? '' }}</td>
        						<td>{{ $value['searches'] ?? '' }}</td>
        						<td>{{ $value['competition'] ?? '' }}</td>
        						<td>${{ $value['cpc'] ?? '0' }}</td>
        					</tr>
        					@endforeach
    					@endif;
    				</tbody>
    			</table>
    		</div>
    	</div>
        @endif
    </div>
</div>
@endsection
