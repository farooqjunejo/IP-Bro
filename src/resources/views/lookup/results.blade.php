@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Results for {{ $results['overview']['target'] }}</h2>
    <div>
        <button class="btn btn-sm btn-outline-secondary" onclick="window.print()">Print</button>
        <button class="btn btn-sm btn-outline-primary" onclick="copyJson()">Copy JSON</button>
    </div>
</div>

<ul class="nav nav-tabs" id="resultTabs" role="tablist">
    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview">Overview</button></li>
    @if($results['dns'])<li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#dns">DNS</button></li>@endif
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#rdap">RDAP</button></li>
    @if($results['http'])<li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#http">HTTP</button></li>@endif
    @if($results['ssl'])<li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#ssl">SSL</button></li>@endif
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#blacklist">Blacklist</button></li>
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#ports">Ports</button></li>
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#raw">Raw JSON</button></li>
</ul>

<div class="tab-content border border-top-0 bg-body p-4 mb-5 shadow-sm rounded-bottom">
    <div class="tab-pane fade show active" id="overview">@include('lookup.partials.overview')</div>
    @if($results['dns'])<div class="tab-pane fade" id="dns">@include('lookup.partials.dns')</div>@endif
    <div class="tab-pane fade" id="rdap">@include('lookup.partials.rdap')</div>
    @if($results['http'])<div class="tab-pane fade" id="http">@include('lookup.partials.http')</div>@endif
    @if($results['ssl'])<div class="tab-pane fade" id="ssl">@include('lookup.partials.ssl')</div>@endif
    <div class="tab-pane fade" id="blacklist">@include('lookup.partials.blacklist')</div>
    <div class="tab-pane fade" id="ports">@include('lookup.partials.ports')</div>
    <div class="tab-pane fade" id="raw">@include('lookup.partials.raw-json')</div>
</div>

@push('scripts')
<script>
    function copyJson() {
        navigator.clipboard.writeText(JSON.stringify(@json($results), null, 2));
        alert('Copied JSON to clipboard');
    }
</script>
@endpush
@endsection
