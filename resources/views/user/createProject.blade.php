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
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Create Your Project</h2>
                                                        </div>
                                                    </div>
                                                    <input type="email" name="email" placeholder="Website URL" />
                                                    <input type="text" name="uname" placeholder="Website name" />
                                                </div>
                                                <input type="button" name="next" class="next action-button"
                                                    value="Next" />
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Choose Locations</h2>
                                                        </div>
                                                    </div>
                                                    <p>Enter the country or city you do business in or want traffic
                                                        from.</p>
                                                    <input type="text" name="fname"
                                                        placeholder="Enter a Country or City" />
                                                    <span><a href="#">Start 7-day free trial</a> to add 2 or more
                                                        locations.</span>
                                                </div>
                                                <input type="button" name="previous"
                                                    class="previous action-button-previous" value="Previous" />
                                                <input type="button" name="next" class="next action-button"
                                                    value="Next" />
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
                                                                <div class="text-box"></div>
                                                                <img src="assets/images/we-could-not.png">
                                                                <p>We could not retrieve any data from Search Console
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6>Paste keywords, or</h6>
                                                            <div class="right-box-rankk">
                                                                <textarea name="comment"
                                                                    placeholder="Enter text here..."
                                                                    form="usrform"></textarea>
                                                            </div>
                                                            <h4 class="you-can">You can track 25 more keywords
                                                                <em>0/25</em></h4>
                                                        </div>
                                                    </div>
                                                    <div class="cuntry-boxx">
                                                        <ul class="list-unstyled">
                                                            <li class="init">0 locations selected</li>
                                                            <li data-value="value 1">
                                                                <div class="check-bx">
                                                                    <label><input type="checkbox"><span
                                                                            class="checkmark"
                                                                            style="left: 0px;"></span></label>
                                                                </div>
                                                                <div class="loc-bx">
                                                                    <img src="assets/images/word.png">
                                                                    <div class="con-nme">
                                                                        <em>All Locations</em>
                                                                        <span>All Languages</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li data-value="value 2">
                                                                <div class="check-bx">
                                                                    <label>
                                                                        <input type="checkbox"><span class="checkmark"
                                                                            style="left: 0px;"></span></label>
                                                                </div>
                                                                <div class="loc-bx">
                                                                    <img src="assets/images/india 1.png">
                                                                    <div class="con-nme">
                                                                        <em>India</em>
                                                                        <span>All Languages</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <input type="button" name="previous"
                                                    class="previous action-button-previous" value="Previous" />
                                                <input type="button" name="next" class="next action-button"
                                                    value="Finsh" />
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