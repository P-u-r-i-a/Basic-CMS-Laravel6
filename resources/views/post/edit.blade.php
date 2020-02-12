@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Edit Post
                    <div class="float-right">
                        <form action="{{ route('posts.destroy', compact('post')) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Remove" class="btn btn-sm btn-outline-danger">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{ route('posts.update', compact('post')) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control" >
                            @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
                            @error('body')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="meta_description">Meta Description</label>
                            <input type="text" name="meta_description" value="{{ $post->meta_description }}" class="form-control">
                        </div>
                        <div class="from-group mt-2">
                            <label for="status">Status</label>
                            <select name="status" class="custom-select">
                                <option {{ $post->status == 'draft' ? "selected" : "" }} value="draft">Draft</option>
                                <option {{ $post->status == 'publish' ? "selected" : "" }} value="publish">Publish</option>
                            </select>
                        </div>
                        <input type="submit" value="Update" class="mt-3 btn btn-block btn-outline-primary">
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
