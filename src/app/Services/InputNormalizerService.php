<?php
namespace App\Services;

class InputNormalizerService {
    public function normalize($input) {
        $input = trim($input);
        $input = preg_replace('#^https?://#', '', $input);
        $input = explode('/', $input)[0];
        $input = explode(':', $input)[0]; 

        if (filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return ['valid' => true, 'type' => 'ipv6', 'target' => $input];
        }
        if (filter_var($input, FILTER_VALIDATE_IP)) {
            return ['valid' => true, 'type' => 'ip', 'target' => $input];
        }
        if (preg_match('/^(?!:\/\/)(?=.{1,255}$)((.{1,63}\.){1,127}(?![0-9]*$)[a-z0-9-]+\.?)$/i', $input)) {
            return ['valid' => true, 'type' => 'domain', 'target' => $input];
        }
        return ['valid' => false];
    }
}