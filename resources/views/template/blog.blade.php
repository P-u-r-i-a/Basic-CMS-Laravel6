@extends('template.master')

@section('content')
    <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Blog</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Blog Listing</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div id="blog-listing-big" class="col-md-12">
                @foreach ($posts as $post)
                <section class="post">
                    <h2><a href="{{ route('pages.post', compact('post')) }}">{{ $post->title }}</a></h2>
                    <div class="row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6 text-right">
                        </div>
                    </div>
                    <div class="image"><a href="{{ route('pages.post', compact('post')) }}"><img src="{{ Storage::url($post->cover_image) }}" alt="Example blog post alt" class="img-fluid"></a></div>
                    <p class="intro">{{ $post->meta_description }}</p>
                    <p class="read-more text-right"><a href="{{ route('pages.post', compact('post')) }}" class="btn btn-template-outlined">Continue reading</a></p>
                </section>
                <hr>
                @endforeach
                <ul class="pager list-unstyled d-flex align-items-center justify-content-between">
                    {{ $posts->links() }}
               </ul>
            </div>  
          </div>
        </div>
      </div>
@endsection

@push('tags')
    <title>Blog | Basic CMS</title>
@endpush