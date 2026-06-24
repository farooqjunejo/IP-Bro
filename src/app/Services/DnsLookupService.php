<?php
namespace App\Services;

class DnsLookupService {
    public function check($domain) {
        try {
            $records = @dns_get_record($domain, DNS_A + DNS_AAAA + DNS_MX + DNS_NS + DNS_TXT + DNS_CNAME + DNS_SOA);
            return ['success' => true, 'data' => $records ?: []];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}