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
                <div class="card-header">Create New Category</div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="from-group mt-2">
                            <label for="cover_image">Cover Image</label>
                            <input type="file" name="cover" class="form-control">
                            @error('cover')
                                <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                        <input type="submit" value="Create" class="mt-3 btn btn-block btn-outline-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
