@if($results['dns']['success'])
    <h5 class="mb-3">DNS Records</h5>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Type</th>
                    <th>Hostname</th>
                    <th>Target / Value</th>
                    <th>TTL</th>
                </tr>
            </thead>
            <tbody>
                @forelse($results['dns']['data'] as $rec)
                    <tr>
                        <td>
                            @php
                                $badgeColor = match($rec['type']) {
                                    'A' => 'success',
                                    'AAAA' => 'primary',
                                    'MX' => 'danger',
                                    'NS' => 'warning text-dark',
                                    'TXT' => 'info text-dark',
                                    'CNAME' => 'secondary',
                                    default => 'dark'
                                };
                            @endphp
                            <span class="badge bg-{{ $badgeColor }}">{{ $rec['type'] }}</span>
                        </td>
                        <td>{{ $rec['host'] }}</td>
                        <td style="word-break: break-all;">
                            @if($rec['type'] === 'MX')
                                Priority {{ $rec['pri'] }}: {{ $rec['target'] }}
                            @elseif($rec['type'] === 'TXT')
                                {{ $rec['txt'] }}
                            @elseif($rec['type'] === 'SOA')
                                MNAME: {{ $rec['mname'] }}<br>RNAME: {{ $rec['rname'] }}
                            @else
                                {{ $rec['target'] ?? $rec['ip'] ?? $rec['ipv6'] ?? '-' }}
                            @endif
                        </td>
                        <td>{{ $rec['ttl'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No DNS records found for this domain.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-danger">
        <strong>DNS Lookup Failed:</strong> {{ $results['dns']['error'] }}
    </div>
@endif
