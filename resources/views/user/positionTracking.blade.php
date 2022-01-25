@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
     
<div class="hadder-row">
<div class="container">  
<div class="col-md-6"><span>Keyword Research <em><img src="assets/images/right.png"></em></span> 
<button type="button" class="btn btn-primary stig" data-toggle="modal" data-target="#mb-trk">
Settings</button></div>
<div class="col-md-6">
<div class="lt-udt">
Last Updated: <br>
<p>January 11, 2022 13:01 PM</p></div> </div>
</div>
</div>

<div class="keyword-sact">
<div class="container">
	
	
	<div class="modal fade" id="mb-trk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered proj-model" role="document">
  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title titl-ctr" id="exampleModalLongTitle">Project Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <form class="ject-sett">
              <div class="-kewleft-side">
                <label>Project Title</label>
				<div class="proj-rem"><a href="#">Remove this project</a></div>
                <input type="text" required name="keyword" class="form-control" autofocus placeholder="Keyword">
              </div>
            <div class="kewleft-side">
                <label>Domain</label>
				
                <input type="text" required name="keyword" class="form-control" autofocus placeholder="google.com">
              </div>
	 
	 <div class="availa"> <label>Keywords</label><div class=""><strong>9/25</strong> available </div>
	 <div class="progress" style="margin:5px 0">
                        <div class="progress-bar " style="width: 80%;"> </div>
                      </div></div>
	 
	 <div class="radd-rnk">
	 <div class="rgrd-rnk">
		<div class="rak-trk">Rank Tracking Frequency</div> 
		<div class="rak-link"><a href="#"> Upgrade</a> to get daily rank tracking.</div> 
		 </div>
		 <div class="rgrd-rnk">  <div class="row">		 
<div class="col-sm-5">
 <span>Weekly</span> <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
 <span>Daily</span>
</div>

</div>   </div>
	 </div>


 <div class="radd-rnk">
	 <div class="rgrd-rnk">
		<div class="rak-trk">Mobile Rank Tracking</div> 
		<div class="rak-link"><a href="#"> Upgrade</a> to turn on mobile rank tracking.</div> 
		 </div>
		 <div class="rgrd-rnk">  <div class="row">		 
<div class="col-sm-5">
 <span>Off</span> <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
 <span>On</span>
</div>

</div>   </div>
	 </div>
	 
	 
 <div class="radd-rnk">
	 <div class="rgrd-rnk">
		<div class="rak-trk notif">Email Notifications</div> 
		 </div>
		 <div class="rgrd-rnk">  <div class="row">		 
<div class="col-sm-5">
 <span>Off</span> <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
 <span>On</span>
</div>

</div>   </div>
	 </div>	 

	 
	 
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
        <button type="button" class="btn btn-primary">SAVE</button>
      </div>
    </div>
  </div>
</div>
</div>


<div class="rank-bar">
<div class="container">
<div class="rankig-bar">
	
	<Div class="sdf">SHOWING RANKINGS FOR: </Div>
<div class="all-bx">  
<div class="ght-dds">
<img src="assets/images/pc_grey.svg" alt="#">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mb-rak"></button>
</div>
<div class="ght-pdf ">
<img src="assets/images/phone_grey.8be9c41e.svg" alt="#">
<a href="pdf/google.com_position_tracking.pdf" target="_blank">Export PDF</a>		  
</div>
</div>
	<form class="keword-from ranksd">
        <div class="keword-ranksd">
              <div class="ght-side">
              <div class="slect-erow">
                  <select name="action" class="form-control" style="padding-left: 8px;" placeholder="Similar keywords">
                  <option value="similar_keywords" selected="">Google</option>
                  <option value="questions">Google</option>
                </select>
                </div>
              </div> 
		<div class="ght-side">
    <div class="slect-erow">
                  <select name="action" class="form-control" style="padding-left: 8px;" placeholder="Similar keywords">
                  <option value="similar_keywords" selected="">Google</option>
                  <option value="questions">Google</option>
                </select>
</div>
              </div>
		<div class="ght-side">
    <div class="slect-erow">
                    <select name="action" class="form-control" style="padding-left: 8px;" placeholder="Similar keywords">
                  <option value="similar_keywords" selected="">Google</option>
                  <option value="questions">Google</option>
                </select>
</div>
              </div>
</div>

</form>
	
</div> 
</div>
</div>

<div class="nortn">
<div class="container">
<div class="wor-row">
<div class="wor-col">
<div class="rnk-gn">0 <div class="nk-arow"></div></div>
<div class="wordp">Keywords<br>moved up</div>
</div>
<div class="wor-col">
<div class="rnk-gn">0 <div class="nk-arow dna"></div></div>
<div class="wordp">Keywords<br>moved up</div>
</div>
<div class="wor-col">
<div class="rnk-gn">0  </div>
<div class="wordp">Keywords<br>moved up</div>
</div>
</div>

<!---[Grap]--->
<div class="graps"> 
	
	<div class="row">
	<div class="col-md-6">
		<div class="eiFseJ">
		<div class="avgr-row">
		<div class="pon-col">AVERAGE POSITION</div>
		<div class="pon-col ltr">3.33</div>
		</div>
		
		<div class="avdf">
		 2  <div class="cnv-line"></div>
		</div>
		<div class="avdf">
		 3  <div class="cnv-line"></div>
		</div>
		<div class="avdf">
		4 <div class="cnv-line"></div>
		</div>
		<div class="avdf">
		 5 <div class="cnv-line"></div>
		</div>
			<div class="tlt">1/11</div>
		</div>
		
		
		</div>
	<div class="col-md-6"> 
		<div class="ed-keywo">
		<div class="pon-col">AVERAGE POSITION</div>
		<p>Showing changes to your 9 tracked keywords on Google Search.</p>
		</div>
		
		<div class="grap-row">
		<div class="map-grp"> <img src="assets/images/graph.jpg" alt="#"> </div>
			<div class="top-rp">
				
			<div class="ros-trk">
				 <div class="tps-trk">	<span class="words crg"></span> Top 3	</div>
				 <div class="rksd"><span class="rfd">0</span> <span class="sde">7</span> </div>
				
				
				</div>	
			
			<div class="ros-trk">
				 <div class="tps-trk">	<span class="words crg g"></span> Top 10	</div>
				 <div class="rksd"><span class="rfd">0</span> <span class="sde">7</span> </div>
				
				
				</div>	
			<div class="ros-trk">
				 <div class="tps-trk">	<span class="words crg jh"></span> Top 100	</div>
				 <div class="rksd"><span class="rfd">0</span> <span class="sde">7</span> </div>
				
				
				</div>	
			<div class="ros-trk">
				 <div class="tps-trk">	<span class="words crg ny"></span>Not ranking</div>
				 <div class="rksd"><span class="rfd">0</span> <span class="sde">7</span> </div>
				
				
				</div>	
			
			
			</div>
			
				</div>
		
		</div>
	</div></div>
 
<!---[Grap]--->


<div class="trc-tlt">TRACKED KEYWORDS <span class="cls">(1/25)</span></div>

<div class="kesy">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
 <i class="fas fa-plus-circle"></i>  ADD KEYWORDS
</button>
<button type="button" class="btn btn-primary"  >
 EXPORT TO CSV
</button>
<button type="button" class="btn btn-primary btn-delt">
<i class="far fa-trash-alt"></i> DELETE
</button>
	<span class="cont-ps">0 of 9 Selected</span>
</div>

<!---[Table]--->
<table class="table table-xs-responsive table-volsd  table-striped" summary="An example of a responsive table using Bootstrap breakpoints." aria-role="table">  
 
  <thead>    
  <tr>  
    <th> <div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1"></div> </th>  
    <th> POSITION </th>  
    <th> KEYWORD</th>  
    <th>CHANGE </th>  
	<th>VOL </th>  
	<th>SD </th>
	<th>URL </th> 
	  	<th>  </th> 
  </tr>  
  </thead>  
  <tbody>  
  <tr class="even">  
    <td>  <div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		</div>
     </td>  
    <td class="pgn">2</td>  
     <td class="rk-url"><div class="rk-yellow"><a href="">google</a></div> <div>English / India</div> </td>  
   <td class="pgn"> 2 </td>
     <td class="pgn">55.6m </td>  
     <td class="pgn"> 91</td>  
    <td class="ptgn">http://www.google.com/ </td>  
	  <td class="pgnd"> <img src="assets/images/pc_grey.svg" alt="#"> </td> 
  </tr>  
 
    <tr class="odd">  
    <td>  <div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		</div>
     </td>  
    <td class="pgn">2</td>  
     <td class="rk-url"><div class="rk-yellow"><a href="">google</a></div> <div>English / India</div> </td>  
   <td class="pgn"> 2 </td>
     <td class="pgn">55.6m </td>  
     <td class="pgn"> 91</td>  
    <td class="ptgn">http://www.google.com/ </td>  
	  <td class="pgnd"> <img src="assets/images/pc_grey.svg" alt="#"> </td> 
  </tr>  
    <tr class="even">  
    <td>  <div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		</div>
     </td>  
    <td class="pgn">2</td>  
     <td class="rk-url"><div class="rk-yellow"><a href="">google</a></div> <div>English / India</div> </td>  
   <td class="pgn"> 2 </td>
     <td class="pgn">55.6m </td>  
     <td class="pgn"> 91</td>  
    <td class="ptgn">http://www.google.com/ </td>  
	  <td class="pgnd"> <img src="assets/images/pc_grey.svg" alt="#"> </td> 
  </tr>  <tr class="odd">  
    <td>  <div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		</div>
     </td>  
    <td class="pgn">2</td>  
     <td class="rk-url"><div class="rk-yellow"><a href="">google</a></div> <div>English / India</div> </td>  
   <td class="pgn"> 2 </td>
     <td class="pgn">55.6m </td>  
     <td class="pgn"> 91</td>  
    <td class="ptgn">http://www.google.com/ </td>  
	  <td class="pgnd"> <img src="assets/images/pc_grey.svg" alt="#"> </td> 
  </tr>  
    <tr class="even">  
    <td>  <div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		</div>
     </td>  
    <td class="pgn">2</td>  
     <td class="rk-url"><div class="rk-yellow"><a href="">google</a></div> <div>English / India</div> </td>  
   <td class="pgn"> 2 </td>
     <td class="pgn">55.6m </td>  
     <td class="pgn"> 91</td>  
    <td class="ptgn">http://www.google.com/ </td>  
	  <td class="pgnd"> <img src="assets/images/pc_grey.svg" alt="#"> </td> 
  </tr>  <tr class="odd">  
    <td>  <div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		</div>
     </td>  
    <td class="pgn">2</td>  
     <td class="rk-url"><div class="rk-yellow"><a href="">google</a></div> <div>English / India</div> </td>  
   <td class="pgn"> 2 </td>
     <td class="pgn">55.6m </td>  
     <td class="pgn"> 91</td>  
    <td class="ptgn">http://www.google.com/ </td>  
	  <td class="pgnd"> <img src="assets/images/pc_grey.svg" alt="#"> </td> 
  </tr>  
    <tr class="even">  
    <td>  <div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		</div>
     </td>  
    <td class="pgn">2</td>  
     <td class="rk-url"><div class="rk-yellow"><a href="">google</a></div> <div>English / India</div> </td>  
   <td class="pgn"> 2 </td>
     <td class="pgn">55.6m </td>  
     <td class="pgn"> 91</td>  
    <td class="ptgn">http://www.google.com/ </td>  
	  <td class="pgnd"> <img src="assets/images/pc_grey.svg" alt="#"> </td> 
  </tr>  
  </tbody>  
</table>  
<!---[Table]--->
</div>
 </div>


 </div>
</div>







    </div>
</div>
@endsection