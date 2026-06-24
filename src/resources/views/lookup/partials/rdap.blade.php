@if($results['rdap']['success'])
    @php
        $rdap = $results['rdap']['data'];
        $type = $results['overview']['type'];
        
        // Extract Organization / Registrar safely
        $organization = 'Not Disclosed';
        if (isset($rdap['entities'])) {
            foreach ($rdap['entities'] as $entity) {
                if (isset($entity['vcardArray'][1])) {
                    foreach ($entity['vcardArray'][1] as $vcard) {
                        if ($vcard[0] === 'fn') {
                            $organization = $vcard[3];
                            break 2;
                        }
                    }
                }
            }
        }

        // Extract Dates safely
        $registrationDate = 'Unknown';
        $expirationDate = 'Unknown';
        if (isset($rdap['events'])) {
            foreach ($rdap['events'] as $event) {
                if ($event['eventAction'] === 'registration') $registrationDate = date('Y-m-d H:i:s', strtotime($event['eventDate']));
                if ($event['eventAction'] === 'expiration') $expirationDate = date('Y-m-d H:i:s', strtotime($event['eventDate']));
            }
        }
    @endphp

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">RDAP Information</h5>
        <a href="{{ $results['rdap']['link'] }}" target="_blank" class="btn btn-sm btn-outline-info">View Raw RDAP Source</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th style="width: 30%;">RDAP Handle</th>
                    <td>{{ $rdap['handle'] ?? 'N/A' }}</td>
                </tr>
                
                @if($type === 'domain')
                    <tr>
                        <th>Domain Name</th>
                        <td>{{ $rdap['ldhName'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Registrar</th>
                        <td><strong>{{ $organization }}</strong></td>
                    </tr>
                    <tr>
                        <th>Registration Date</th>
                        <td>{{ $registrationDate }}</td>
                    </tr>
                    <tr>
                        <th>Expiration Date</th>
                        <td>{{ $expirationDate }}</td>
                    </tr>
                    <tr>
                        <th>Domain Status</th>
                        <td>
                            @if(isset($rdap['status']))
                                @foreach($rdap['status'] as $status)
                                    <span class="badge bg-secondary mb-1">{{ $status }}</span>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endif

                @if($type === 'ip' || $type === 'ipv6')
                    <tr>
                        <th>Network Name</th>
                        <td>{{ $rdap['name'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Organization / ISP</th>
                        <td><strong>{{ $organization }}</strong></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{ $rdap['country'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>IP Range</th>
                        <td>{{ $rdap['startAddress'] ?? 'N/A' }} - {{ $rdap['endAddress'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>IP Version</th>
                        <td>{{ $rdap['ipVersion'] ?? 'N/A' }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-warning">
        <strong>RDAP Check Failed:</strong> {{ $results['rdap']['error'] }}
    </div>
@endif
