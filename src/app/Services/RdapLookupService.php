<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;

class RdapLookupService {
    public function check($target, $type) {
        $endpoint = ($type === 'domain') ? "https://rdap.org/domain/{$target}" : "https://rdap.org/ip/{$target}";
        try {
            $response = Http::timeout(5)->get($endpoint);
            if ($response->successful()) return ['success' => true, 'data' => $response->json(), 'link' => $endpoint];
            return ['success' => false, 'error' => 'RDAP returned status: ' . $response->status()];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => 'RDAP Timeout or Failure'];
        }
    }
}