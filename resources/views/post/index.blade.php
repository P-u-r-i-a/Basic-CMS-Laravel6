@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        @foreach ($posts as $post)
            <div class="col-md-4 mt-3">
                <div class="card">
                    @if($post->status == 'publish')
                        <span class="badge badge-success" style="position:absolute !important; top:20px; right:20px; font-size:12px">Published</span>
                    @else
                        <span class="badge badge-warning" style="position:absolute !important; top:20px; right:20px; font-size:12px">Draft</span>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <a href="{{ route('posts.edit', compact('post')) }}" class="btn btn-outline-primary btn-block">Edit Post</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex align-items-center justify-content-center mt-5">
        {{ $posts->links() }}
    </div>
</div>
@endsection
