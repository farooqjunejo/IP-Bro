@if($results['ssl']['success'])
    @php $ssl = $results['ssl']['data']; @endphp
    <ul class="list-group">
        <li class="list-group-item"><strong>Issuer:</strong> {{ $ssl['issuer'] }}</li>
        <li class="list-group-item"><strong>Subject:</strong> {{ $ssl['subject'] }}</li>
        <li class="list-group-item"><strong>Valid From:</strong> {{ $ssl['valid_from'] }}</li>
        <li class="list-group-item"><strong>Valid Until:</strong> {{ $ssl['valid_to'] }} ({{ $ssl['days_remaining'] }} days remaining)</li>
        <li class="list-group-item"><strong>SAN:</strong> {{ $ssl['san'] }}</li>
    </ul>
@else
    <div class="alert alert-warning">{{ $results['ssl']['error'] }}</div>
@endif