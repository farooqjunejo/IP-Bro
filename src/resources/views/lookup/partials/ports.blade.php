<div class="alert alert-warning border-warning">
    <strong>⚠️ Warning:</strong> Only check servers you own or have permission to test.
</div>
@if($results['ports']['success'])
    @if(count($results['ports']['data']) > 0)
        <ul>
            @foreach($results['ports']['data'] as $port)
                <li><span class="badge bg-success">OPEN</span> Port {{ $port }}</li>
            @endforeach
        </ul>
    @else
        <p>No common ports open.</p>
    @endif
@else
    <div class="alert alert-danger">{{ $results['ports']['error'] }}</div>
@endif