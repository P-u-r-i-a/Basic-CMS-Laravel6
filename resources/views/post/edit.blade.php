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
                <img class="card-img-top" src="{{ Storage::url($post->cover_image) }}" >
                <div class="card-header">
                    Edit Post
                    <div class="float-right">
                        <form action="{{ route('posts.destroy', compact('post')) }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Remove" class="btn btn-sm btn-outline-danger">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{ route('posts.update', compact('post')) }}" method="POST" enctype="multipart/form-data">
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
                            <textarea id="editor" name="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
                            @error('body')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="meta_description">Meta Description</label>
                            <input type="text" name="meta_description" value="{{ $post->meta_description }}" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="categories">Categories</label>
                            <select name="categories[]" id="multiple-select" class="form-control" multiple data-max-options="3" data-live-search="true">
                                @foreach($categories as $category)
                                    <option {{ in_array($category->id, $post->categories()->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                        <div class="from-group mt-2">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="" alt="cover image preview" class="img-fluid d-none" id="img-preview">
                            </div>
                            <label for="cover_image">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" id="img-input">
                            @error('cover_image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
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

@include('script.trumbowyg')
@include('script.bootstrap-select')

@push('scripts')
    @include('script.remove-confirmation')
    @include('script.image-preview')
@endpush