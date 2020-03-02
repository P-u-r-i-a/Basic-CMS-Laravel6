@extends('dashboard.master')

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
    </div>
    @foreach ($media as $file)
        <div class="card mt-3">
            <span class="badge badge-success" style="position:absolute !important; top:20px; right:20px; font-size:12px">{{ $file->mime }}</span>
            <div class="card-body">
                <h5 class="card-title">{{ $file->name }}</h5>
                <p class="card-text"></p>
                <input class="form-control" type="text" value="{{ url(Storage::url($file->path)) }}" disabled>
                <p class="pt-3">{{ $file->description }}</p>
            </div>
            <div class="card-footer d-flex flex-row">
                <a href="{{ Storage::url($file->path) }}" class="card-link btn btn-outline-success btn-sm" target="_blank">View</a>
            </div>
        </div>    
    @endforeach
    <div class="d-flex align-items-center justify-content-center mt-5">
        {{ $media->links() }}
    </div>
</div>
@endsection








