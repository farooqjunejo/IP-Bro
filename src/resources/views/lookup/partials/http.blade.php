@if($results['http']['success'])
    <p><strong>Status:</strong> {{ $results['http']['data']['status'] }}</p>
    <p><strong>Final URL:</strong> {{ $results['http']['data']['redirect'] }}</p>
    <table class="table table-sm">
        @foreach($results['http']['data']['headers'] as $key => $val)
            <tr><th>{{ $key }}</th><td>{{ $val }}</td></tr>
        @endforeach
    </table>
@else
    <div class="alert alert-warning">{{ $results['http']['error'] }}</div>
@endif