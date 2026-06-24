<?php
namespace App\Services;

class BlacklistService {
    public function check($ip) {
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return ['success' => false, 'error' => 'IPv4 required for blacklist check.'];
        }
        $lists = ['zen.spamhaus.org', 'bl.spamcop.net', 'dnsbl.sorbs.net', 'b.barracudacentral.org', 'psbl.surriel.com'];
        $rev = implode('.', array_reverse(explode('.', $ip)));
        $results = [];
        $listedCount = 0;

        foreach ($lists as $list) {
            $host = "{$rev}.{$list}";
            $listed = checkdnsrr($host, "A");
            $results[$list] = $listed;
            if ($listed) $listedCount++;
        }
        return ['success' => true, 'data' => ['details' => $results, 'count' => $listedCount]];
    }
}