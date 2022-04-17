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

<form id="msform" method="post" action="{{route('add-competitor')}}">
    @csrf
    <fieldset>
        <div class="form-card rank-tra">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Add Competitor</h2>
                </div>
            </div>
            <input type="hidden" name="projectID" value="{{ Crypt::encryptString($projectID) ?? null}}">
        </div>
        <input type="submit" class="action-button" value="Finsh" />
    </fieldset>
</form>
