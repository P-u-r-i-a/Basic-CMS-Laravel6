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
                <div class="card-header">Create New Post</div>
                <div class="card-body">
                   <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" >
                            @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea id="editor" name="body" cols="30" rows="10" class="form-control">{{ old('body') }}</textarea>
                            @error('body')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="meta_description">Meta Description</label>
                            <input type="text" name="meta_description" value="{{ old('meta_description') }}" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="categories">Categories</label>
                            <select name="categories[]" id="multiple-select" class="form-control" multiple data-max-options="3" data-live-search="true">
                                @foreach($categories as $category)
                                    <option {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <option value="draft">Draft</option>
                                <option value="publish">Publish</option>
                            </select>
                        </div>
                        <input type="submit" value="Create" class="mt-3 btn btn-block btn-outline-success">
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.12/dist/css/bootstrap-select.min.css">    
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.12/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(function () {
            $('#multiple-select').selectpicker();
        });
    </script>

    <script>
        window.onload = function() {
            const IMG_INPUT = document.querySelector('#img-input');
            const READER = new FileReader();
            const IMG_PREVIEW = document.querySelector('#img-preview');   

            IMG_INPUT.addEventListener('change', e => {
                    READER.readAsDataURL(e.target.files[0]);
                })    
        
            READER.onload = function(event) { 
                IMG_PREVIEW.src = event.target.result;  
                IMG_PREVIEW.classList.remove('d-none');
                }
        }    
    </script>
@endpush