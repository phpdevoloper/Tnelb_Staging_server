<?php

namespace App\Http\Middleware;

use App\Models\SiteStatistic;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IncrementSiteVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->expectsJson() || $request->ajax()) {
            return $next($request);
        }

        foreach (['admin', 'admincms', 'api'] as $prefix) {
            if ($request->is($prefix) || $request->is($prefix . '/*')) {
                return $next($request);
            }
        }

        if (!$request->session()->get('site_visitor_counted')) {
            SiteStatistic::query()->whereKey(1)->increment('visitor_count');
            $request->session()->put('site_visitor_counted', true);
        }

        return $next($request);
    }
}
