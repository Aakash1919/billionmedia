@push('style')
<style>
    .ui-autocomplete-loading {
        background: white url("{{asset('assets/images/ui-anim_basic_16x16.gif')}}") right center no-repeat;
    }

    .ui-autocomplete {
        position: absolute;
        cursor: default;
        z-index: 9999 !important;
         !important;
    }
</style>
@endpush
@if (count($errors) > 0)
@include('components.Alerts.default', array('attributes' => array(
    'title' => 'Validation Errors',
    'errors' => $errors->all()
            )))
@endif
<form id="msform" method="post" action="{{route('save-project')}}">
    @csrf
    <fieldset>
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Create Your Project</h2>
                </div>
            </div>
            <input type="text" name="website_name" placeholder="Website name" required/>
            <input type="text" name="website_url" placeholder="Website URL"  required/>
        </div>
        <input type="button" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Choose Locations</h2>
                </div>
            </div>
            <p>Enter the country or city you do business in or want traffic from.</p>
            <input id="country" type="text" name="country" placeholder="Enter a Country or City"  required/>
            {{-- <span><a href="#">Start 7-day free trial</a> to add 2 or more locations.</span> --}}
        </div>
        <input type="button"  class="previous action-button-previous" value="Previous" />
        <input type="button" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <div class="form-card rank-tra">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Add Keywords to Rank Tracking</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>Paste keywords</h6>
                    <div class="right-box-rankk">
                        <textarea name="keywords" placeholder="Enter text here..." required></textarea>
                    </div>
                    <h4 class="you-can">You can track 25 more keywords
                        <em>0/25</em>
                    </h4>
                </div>
            </div>
            {{-- <div class="cuntry-boxx">
                <ul class="list-unstyled">
                    <li class="init">0 locations selected</li>
                    <li data-value="value 1">
                        <div class="check-bx">
                            <label><input type="checkbox"><span class="checkmark" style="left: 0px;"></span></label>
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
                                <input type="checkbox"><span class="checkmark" style="left: 0px;"></span></label>
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
            </div> --}}
        </div>
        <input type="button"  class="previous action-button-previous" value="Previous" />
        <input type="submit" class="action-button" value="Finsh" />
    </fieldset>
</form>
@push('javascript')
<script>
    $(function () {
        function split(val) {
            return val.split(/,\s*/);
        }
        function extractLast(term) {
            return split(term).pop();
        }

        $("#country").on("keydown", function (event) {
            if (event.keyCode === $.ui.keyCode.TAB &&
                $(this).autocomplete("instance").menu.active) {
                event.preventDefault();
            }
        }).autocomplete({
            source: function (request, response) {
                $.getJSON("{{ route('get-countries')}}", {
                    term: extractLast(request.term)
                }, response);
            },
            search: function () {
                var term = extractLast(this.value);
                if (term.length < 2) {
                    return false;
                }
            },
            focus: function () {
                return false;
            },
            select: function (event, ui) {
                var terms = split(this.value);
                terms.pop();
                terms.push(ui.item.value);
                terms.push("");
                this.value = terms.join(", ");
                return false;
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;
        setProgressBar(current);
        $(".next").click(function () {
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(++current);
        });
        $(".previous").click(function () {
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            previous_fs.show();
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(--current);
        });
        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }
        $(".submit").click(function () {
            return false;
        })
    });
</script>
@endpush