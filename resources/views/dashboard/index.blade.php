@extends('dashboard.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('posts.index') }}" class="btn btn-block btn-outline-primary">Posts</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-block btn-outline-primary">Categories</a>
                    <a href="{{ route('posts.create') }}" class="btn btn-block btn-outline-success">Create New Post</a>
                    <a href="{{ route('categories.create') }}" class="btn btn-block btn-outline-success">Create New Category</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
