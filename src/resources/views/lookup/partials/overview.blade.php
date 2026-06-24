<table class="table table-bordered">
    <tr><th>Target</th><td>{{ $results['overview']['target'] }}</td></tr>
    <tr><th>Type</th><td><span class="badge bg-secondary">{{ strtoupper($results['overview']['type']) }}</span></td></tr>
    <tr><th>Resolved IP</th><td>{{ $results['overview']['resolved_ip'] }}</td></tr>
    @if($results['overview']['reverse_dns'])
    <tr><th>Reverse DNS</th><td>{{ $results['overview']['reverse_dns'] }}</td></tr>
    @endif
</table>