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

<form id="msform" method="post" action="{{route('add-project-keyword')}}">
    @csrf
    
    <fieldset>
        <div class="form-card rank-tra">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Add Keywords to Rank Tracking</h2>
                </div>
            </div>
            <input type="hidden" name="projectID" value="{{ Crypt::encryptString($project->id) ?? null}}">
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
            
        </div>
        <input type="submit" class="action-button" value="Finsh" />
    </fieldset>
</form>
