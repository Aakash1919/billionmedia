@extends('layouts.public')
@section('content')
    <div class="banner-blog">
        <div class="container">
            <div class="row">
                <h2>{{ $blogDetail->title ?? 'What is SEO' }}</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="blog-detlas-saction">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-detlas-saction-left">
                        <img src="{{ isset($blogDetail->image) ? asset('assets/images/blogs/' . $blogDetail->image) : '' }}">
                        {!! html_entity_decode($blogDetail->description ?? 'Description') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
