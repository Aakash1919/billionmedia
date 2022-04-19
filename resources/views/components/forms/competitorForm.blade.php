@push('style')
    <style>
        .ui-autocomplete-loading {
            background: white url("{{ asset('assets/images/ui-anim_basic_16x16.gif') }}") right center no-repeat;
        }

        .ui-autocomplete {
            position: absolute;
            cursor: default;
            z-index: 9999 !important;
             !important;
        }

        .form-control {
            margin: 1%;
        }

    </style>
@endpush

<form id="csform" method="post" action="{{ route('add-competitor') }}">
    @csrf
    <fieldset>
        <div class="form-card rank-tra">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Add Competitor</h2>
                </div>
            </div>
            <input type="hidden" name="projectID" value="{{ Crypt::encryptString($project->id) ?? null }}">
            <input type="hidden" name="country" value="{{ $project->location ?? null }}">

            <div class="form-group">
                <input type="text" class="form-control" name="website_name" placeholder="Website name" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="website_url" placeholder="Website URL" required />
            </div>
            <div class="form-group">
                <textarea name="keywords" class="form-control" placeholder="Enter Keywords here comma seperated" required
                    rows=8></textarea>
            </div>
        </div>
        <input type="submit" class="action-button" value="Finish" />
    </fieldset>
</form>

@push('javascript')
    <script>
        $("#csform").validate({
            rules: {
                website_url: {
                    required: true,
                    url: true
                },
                website_name: {
                    required: true
                },
                keywords: {
                    required: true,
                },
            }
        });
    </script>
@endpush
