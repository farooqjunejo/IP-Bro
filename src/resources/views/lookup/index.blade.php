@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 text-center mt-5">
        <h1 class="mb-4">IP-Bro Lookup</h1>
        @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
        <form action="{{ route('lookup') }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="target" class="form-control form-control-lg" placeholder="Enter IP, Domain, Hostname, or URL" required autofocus>
                <button class="btn btn-primary btn-lg" type="submit">Analyze</button>
            </div>
            <small class="text-muted text-start">Valid inputs: 8.8.8.8, 2001:4860:4860::8888, google.com, https://github.com/test</small>
        </form>
    </div>
</div>
@endsection