@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">


        <div class="add-project-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/images/about_img.png">
                    </div>
                    <div class="col-md-6">
                        <h2><span>Create a project</span> so you can track and improve your SEO traffic.</h2>
                        <ul>
                            <li>Track and improve your rankings</li>
                            <li>Get daily status updates on how you are doing</li>
                            <li>Get alerts about critical issues on your website</li>
                            <li>Monitor your SEO health</li>
                        </ul>
                        <button id="cust_btn" type="button" class="btn btn-info btn-lg" data-toggle="modal"
                            data-target="#myModal">Add Your First Project</button>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="msform">
                                            <fieldset>
                                                <div class="form-card">
                                                    <div class="row">
                                                    <div class="col-7"><h2 class="fs-title">Create Your Project</h2></div>
                                                    </div>
                                                    <input type="email" name="email" placeholder="Website URL" /> 
                                                    <input type="text" name="uname" placeholder="Website name" /> 
                                                </div> 
                                                <input type="button" name="next" class="next action-button" value="Next" />
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Choose Locations</h2>
                                                        </div>
                                                    </div> 
                                                    <p>Enter the country or city you do business in or want traffic from.</p>
                                                     <input type="text" name="fname" placeholder="Enter a Country or City" />   
                                                     <span><a href="#">Start 7-day free trial</a> to add 2 or more locations.</span>  
                                                </div> 
                                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                <input type="button" name="next" class="next action-button" value="Next" />
                                                    
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card rank-tra">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Add Keywords to Rank Tracking</h2>
                                                        </div>
                                                    </div> 
                                                <div class="row">
                                                <div class="col-md-6">
                                                 <h6>Add keywords you currently rank for</h6> 
                                                 <div class="box-left-rank">
                                                 <p>We could not retrieve any data from Search Console</p>    
                                                 </div>  
                                                </div> 
                                                
                                                <div class="col-md-6">  
                                                <h6>Paste keywords, or <a href="#">import from CSV</a></h6> 
                                                <div class="right-box-rankk">
                                                <textarea name="comment" placeholder="Enter text here..." form="usrform"></textarea>
                                                </div>
                                                </div>
                                                </div>

                                                </div>    
                                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />    
                                            <input type="button" name="next" class="next action-button" value="Submit" /> 
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Finish:</h2>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">Step 4 - 4</h2>
                                                        </div>
                                                    </div> <br><br>
                                                    <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                                                    <br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png"
                                                                class="fit-image"> </div>
                                                    </div> <br><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-7 text-center">
                                                            <h5 class="purple-text text-center">You Have Successfully
                                                                Signed Up</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection