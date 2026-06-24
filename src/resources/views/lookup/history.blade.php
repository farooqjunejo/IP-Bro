@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Lookup History</h2>
    <form action="{{ route('history.clear') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Clear all history?')">Clear All</button>
    </form>
</div>
<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover mb-0">
        <thead class="table-dark">
            <tr>
                <th>Target</th>
                <th>Type</th>
                <th>IP</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($history as $item)
            <tr>
                <td>{{ $item->original_target }}</td>
                <td><span class="badge bg-secondary">{{ strtoupper($item->input_type) }}</span></td>
                <td>{{ $item->resolved_ip }}</td>
                <td>{{ $item->created_at->diffForHumans() }}</td>
                <td>
                    <form action="{{ route('history.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-3">
    {{ $history->links('pagination::bootstrap-5') }}
</div>
@endsection
