@if($results['blacklist']['success'])
    <h5>Found in {{ $results['blacklist']['data']['count'] }} lists</h5>
    <ul class="list-group">
        @foreach($results['blacklist']['data']['details'] as $list => $listed)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $list }}
                <span class="badge bg-{{ $listed ? 'danger' : 'success' }}">{{ $listed ? 'Listed' : 'Clean' }}</span>
            </li>
        @endforeach
    </ul>
@else
    <div class="alert alert-info">{{ $results['blacklist']['error'] }}</div>
@endif