<?php
namespace App\Services;

class HttpHeaderService {
    public function check($target) {
        try {
            $ch = curl_init("http://{$target}");
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true, CURLOPT_HEADER => true,
                CURLOPT_NOBODY => true, CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 5, CURLOPT_MAXREDIRS => 3
            ]);
            $response = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);

            if (!$response) throw new \Exception("Could not connect to HTTP");

            return ['success' => true, 'data' => ['status' => $info['http_code'], 'redirect' => $info['url'], 'headers' => $this->parseHeaders($response)]];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    private function parseHeaders($raw) {
        $headers = [];
        foreach (explode("\r\n", $raw) as $line) {
            if (strpos($line, ': ') !== false) {
                list($key, $val) = explode(': ', $line, 2);
                $headers[$key] = $val;
            }
        }
        return $headers;
    }
}