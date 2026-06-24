<?php
namespace App\Services;

class SslLookupService {
    public function check($domain) {
        try {
            $stream = stream_context_create(["ssl" => ["capture_peer_cert" => true, "verify_peer" => false, "verify_peer_name" => false]]);
            $client = @stream_socket_client("ssl://{$domain}:443", $errno, $errstr, 5, STREAM_CLIENT_CONNECT, $stream);
            if (!$client) throw new \Exception("SSL Connection Failed");

            $params = stream_context_get_params($client);
            $cert = openssl_x509_parse($params['options']['ssl']['peer_certificate']);
            
            return [
                'success' => true, 
                'data' => [
                    'issuer' => $cert['issuer']['CN'] ?? 'Unknown',
                    'subject' => $cert['subject']['CN'] ?? 'Unknown',
                    'valid_from' => date('Y-m-d H:i:s', $cert['validFrom_time_t']),
                    'valid_to' => date('Y-m-d H:i:s', $cert['validTo_time_t']),
                    'days_remaining' => floor(($cert['validTo_time_t'] - time()) / 86400),
                    'san' => $cert['extensions']['subjectAltName'] ?? 'None'
                ]
            ];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}