@extends('template.master')

@section('content')
<div id="heading-breadcrumbs" class="border-top-0 border-bottom-0">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
        <div class="col-md-7">
            <h1 class="h2">{{ $post->title }}</h1>
        </div>
        <div class="col-md-5">
            <ul class="breadcrumb d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pages.blog') }}">Blog</a></li>
            <li class="breadcrumb-item active">{{ $post->title }}</li>
            </ul>
        </div>
        </div>
    </div>
    </div>
    <div id="content">
    <div class="container">
        <div class="row bar">
        <div id="blog-post" class="col-md-12">
            <div id="post-content">
            <p><img src="{{ Storage::url($post->cover_image) }}" alt="{{ $post->title }}" class="img-fluid"></p>
            <div>
                {!! $post->body !!}
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@push('tags')
    <title>{{ $post->title . ' | Basic CMS' }}</title>
@endpush