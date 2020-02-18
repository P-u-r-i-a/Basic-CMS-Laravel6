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
        @foreach ($categories as $category)
            <div class="col-md-4 mt-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ Storage::url($category->cover) }}" alt="{{ $category->name  }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <a href="{{ route('categories.edit', compact('category')) }}" class="btn btn-outline-primary btn-block">Edit Category</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex align-items-center justify-content-center mt-5">
        {{ $categories->links() }}
    </div>
</div>
@endsection
