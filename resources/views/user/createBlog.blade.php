@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            @if (session('status'))
                @include('components.Alerts.default', [
                    'attributes' => [
                        'title' => 'Message',
                        'message' => 'Blog Added Successfully',
                    ],
                ])
            @endif
            <div class="hadder-row">
                <div class="container">
                    <div class="col-md-6"><span>Keyword Research <em><img
                                    src="{{ asset('assets/images/right.png') }}"></em></span>
                        <button type="button" class="btn btn-primary stig">Blog Name</button>
                    </div>
                </div>
            </div>
            <div class="card rank-tranking-table">
                <div class="card-body">
                    <form action="{{ route('save-blog') }}" class="blogForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ old('blog_id', $blog->id ?? '') }}" />
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" autofocus
                                placeholder="Title Of The Blog" value="{{ old('title', $blog->title ?? '') }}" required>
                        </div>
                            <img src="{{ isset($blog->image) ? asset('assets/images/blogs/' . $blog->image) : '' }}"
                                id="imgPreview" class="center-img">
                        <div class="form-group">
                            <label for="image">Featured Image</label>
                            <input type="file" id="image" name="image" class="form-control" autofocus
                                placeholder="Image Of the Blog">
                        </div>
                        <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <input type="text" id="short_description" name="short_description" class="form-control"
                                autofocus placeholder="Short Description"
                                value="{{ old('short_description', $blog->short_description ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description"
                                id="description">{{ old('description', html_entity_decode($blog->description ?? '')) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="title">status</label>
                            <select class="form-control" name="status">
                                <option value="0" {{isset($blog->status) && $blog->status==0 ? 'selected': ''}}>Draft</option>
                                <option value="1" {{isset($blog->status) && $blog->status==1 ? 'selected': ''}}>Publish</option>
                            </select>
                        </div>
                        <div class="btn-keyword">
                            <input type="submit" class="btn btn-primary" value="Save Blog">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');

        $(document).ready(() => {
            $('#image').change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
