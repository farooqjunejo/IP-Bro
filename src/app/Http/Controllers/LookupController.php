<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LookupHistory;
use App\Services\{InputNormalizerService, DnsLookupService, RdapLookupService, HttpHeaderService, SslLookupService, BlacklistService, PortCheckService};

class LookupController extends Controller
{
    public function index() { return view('lookup.index'); }

    public function lookup(Request $request, InputNormalizerService $normalizer, DnsLookupService $dns, RdapLookupService $rdap, HttpHeaderService $http, SslLookupService $ssl, BlacklistService $blacklist, PortCheckService $ports)
    {
        $request->validate(['target' => 'required|string|max:255']);
        $original = $request->input('target');
        
        $norm = $normalizer->normalize($original);
        if (!$norm['valid']) {
            return back()->with('error', 'Invalid input provided. Please enter a valid IP, Domain, or URL.');
        }

        $target = $norm['target'];
        $type = $norm['type'];
        $resolvedIp = $type === 'domain' ? gethostbyname($target) : $target;
        $reverseDns = $type === 'ip' || $type === 'ipv6' ? @gethostbyaddr($target) : null;

        $results = [
            'overview' => [
                'target' => $target,
                'type' => $type,
                'resolved_ip' => $resolvedIp,
                'reverse_dns' => $reverseDns,
            ],
            'dns' => $type === 'domain' ? $dns->check($target) : null,
            'rdap' => $rdap->check($target, $type),
            'http' => $type === 'domain' || $type === 'ip' ? $http->check($target) : null,
            'ssl' => $type === 'domain' ? $ssl->check($target) : null,
            'blacklist' => $blacklist->check($resolvedIp),
            'ports' => $ports->check($target)
        ];

        LookupHistory::create([
            'original_target' => $original,
            'normalized_target' => $target,
            'input_type' => $type,
            'resolved_ip' => $resolvedIp,
            'user_ip' => $request->ip(),
            'result_summary' => $results
        ]);

        return view('lookup.results', compact('results'));
    }

    public function history() {
        $history = LookupHistory::latest()->paginate(20);
        return view('lookup.history', compact('history'));
    }

    public function destroy($id) {
        LookupHistory::findOrFail($id)->delete();
        return back()->with('success', 'Item deleted.');
    }

    public function clear() {
        LookupHistory::truncate();
        return back()->with('success', 'History cleared.');
    }
}