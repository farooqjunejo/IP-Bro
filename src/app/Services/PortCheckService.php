<?php
namespace App\Services;

class PortCheckService {
    public function check($target) {
        $ports = [21=>'FTP', 22=>'SSH', 25=>'SMTP', 53=>'DNS', 80=>'HTTP', 110=>'POP3', 143=>'IMAP', 443=>'HTTPS', 465=>'SMTPS', 587=>'SMTP Sub', 993=>'IMAPS', 995=>'POP3S', 3306=>'MySQL', 3389=>'RDP', 8080=>'HTTP Alt', 8443=>'HTTPS Alt'];
        $openPorts = [];
        foreach ($ports as $port => $name) {
            $connection = @fsockopen($target, $port, $errno, $errstr, 0.5);
            if (is_resource($connection)) {
                $openPorts[] = "$port ($name)";
                fclose($connection);
            }
        }
        return ['success' => true, 'data' => $openPorts];
    }
}