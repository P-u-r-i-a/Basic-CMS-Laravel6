@extends('dashboard.master')

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
                <div class="card-header">Settings</div>
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        @foreach ($settings as $setting)
                            <div class="form-group">
                                <label for="{{ $setting->name }}">{{ $setting->name }}</label>    
                                <input class="form-control" type="text" id="{{ $setting->name }}" name="{{ strtolower($setting->name) }}" value="{{ $setting->value }}">
                            @error($setting->name)
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>    
                        @endforeach
                        <input type="submit" value="Update" class="btn btn-outline-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
