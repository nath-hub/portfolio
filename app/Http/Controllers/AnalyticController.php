<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Analytic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticController extends Controller
{
    /**
     * Enregistrer les données analytics
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'session.id' => 'required|string',
            'session.pageViews' => 'required|integer',
            'location.country' => 'nullable|string',
            'location.city' => 'nullable|string',
            'location.region' => 'nullable|string',
            'location.ip' => 'nullable|string',
            'location.timezone' => 'nullable|string',
            'location.latitude' => 'nullable|numeric',
            'location.longitude' => 'nullable|numeric',
            'device.type' => 'required|string',
            'device.os' => 'nullable|string',
            'device.browser' => 'nullable|string',
            'device.screenWidth' => 'nullable|integer',
            'device.screenHeight' => 'nullable|integer',
            'device.viewportWidth' => 'nullable|integer',
            'device.viewportHeight' => 'nullable|integer',
            'device.orientation' => 'nullable|string',
            'device.touchSupport' => 'nullable|boolean',
            'device.userAgent' => 'nullable|string',
            'page.url' => 'required|string',
            'page.path' => 'required|string',
            'page.title' => 'nullable|string',
            'page.referrer' => 'nullable|string',
            'page.language' => 'nullable|string',
            'time.totalSeconds' => 'required|integer',
            'time.formatted' => 'nullable|string',
            'scroll.scrollPercent' => 'nullable|integer',
        ]);

        $analytic = Analytic::create([
            'session_id' => $validated['session']['id'],
            'page_views' => $validated['session']['pageViews'],
            'is_new_visitor' => $validated['session']['pageViews'] === 1,
            'country' => $validated['location']['country'] ?? null,
            'city' => $validated['location']['city'] ?? null,
            'region' => $validated['location']['region'] ?? null,
            'ip_address' => $validated['location']['ip'] ?? $request->ip(),
            'timezone' => $validated['location']['timezone'] ?? null,
            'latitude' => $validated['location']['latitude'] ?? null,
            'longitude' => $validated['location']['longitude'] ?? null,
            'device_type' => $validated['device']['type'],
            'operating_system' => $validated['device']['os'] ?? null,
            'browser' => $validated['device']['browser'] ?? null,
            'screen_width' => $validated['device']['screenWidth'] ?? null,
            'screen_height' => $validated['device']['screenHeight'] ?? null,
            'viewport_width' => $validated['device']['viewportWidth'] ?? null,
            'viewport_height' => $validated['device']['viewportHeight'] ?? null,
            'orientation' => $validated['device']['orientation'] ?? null,
            'touch_support' => $validated['device']['touchSupport'] ?? false,
            'user_agent' => $validated['device']['userAgent'] ?? $request->userAgent(),
            'url' => $validated['page']['url'],
            'path' => $validated['page']['path'],
            'page_title' => $validated['page']['title'] ?? null,
            'referrer' => $validated['page']['referrer'] ?? null,
            'language' => $validated['page']['language'] ?? null,
            'time_spent_seconds' => $validated['time']['totalSeconds'],
            'time_spent_formatted' => $validated['time']['formatted'] ?? null,
            'scroll_percent' => $validated['scroll']['scrollPercent'] ?? 0,
            'max_scroll_percent' => $validated['scroll']['scrollPercent'] ?? 0,
            'visited_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Analytics enregistré avec succès',
            'data' => $analytic
        ], 201);
    }


      /**
     * Obtenir les statistiques globales
     */
    public function stats()
    {
        $stats = [
            'total_visits' => Analytic::count(),
            'total_unique_sessions' => Analytic::distinct('session_id')->count(),
            'today_visits' => Analytic::today()->count(),
            'this_week_visits' => Analytic::thisWeek()->count(),
            'this_month_visits' => Analytic::thisMonth()->count(),
            'new_visitors' => Analytic::newVisitors()->count(),
            'average_time_spent' => Analytic::avg('time_spent_seconds'),

            // Par appareil
            'by_device' => Analytic::select('device_type', DB::raw('count(*) as total'))
                ->groupBy('device_type')
                ->get(),

            // Top 10 pays
            'top_countries' => Analytic::select('country', DB::raw('count(*) as total'))
                ->whereNotNull('country')
                ->groupBy('country')
                ->orderByDesc('total')
                ->limit(10)
                ->get(),

            // Top 10 villes
            'top_cities' => Analytic::select('city', 'country', DB::raw('count(*) as total'))
                ->whereNotNull('city')
                ->groupBy('city', 'country')
                ->orderByDesc('total')
                ->limit(10)
                ->get(),

            // Pages les plus visitées
            'top_pages' => Analytic::select('path', 'page_title', DB::raw('count(*) as total'))
                ->groupBy('path', 'page_title')
                ->orderByDesc('total')
                ->limit(10)
                ->get(),

            // Navigateurs
            'browsers' => Analytic::select('browser', DB::raw('count(*) as total'))
                ->whereNotNull('browser')
                ->groupBy('browser')
                ->orderByDesc('total')
                ->get(),

            // Systèmes d'exploitation
            'operating_systems' => Analytic::select('operating_system', DB::raw('count(*) as total'))
                ->whereNotNull('operating_system')
                ->groupBy('operating_system')
                ->orderByDesc('total')
                ->get(),
        ];

        return response()->json($stats);
    }


    /**
     * Dashboard analytics (pour une page admin)
     */
    public function dashboard()
    {
        $data = [
            'total_visits' => Analytic::count(),
            'unique_visitors' => Analytic::distinct('session_id')->count(),
            'today' => Analytic::today()->count(),
            'average_time' => gmdate("i:s", Analytic::avg('time_spent_seconds') ?? 0),
            'recent_visitors' => Analytic::orderByDesc('created_at')->limit(20)->get(),
        ];

        return view('analytics.dashboard', $data);
    }
}
