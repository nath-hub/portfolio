<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    protected $fillable = [
        'session_id',
        'page_views',
        'is_new_visitor',
        'country',
        'city',
        'region',
        'ip_address',
        'timezone',
        'latitude',
        'longitude',
        'device_type',
        'operating_system',
        'browser',
        'screen_width',
        'screen_height',
        'viewport_width',
        'viewport_height',
        'orientation',
        'touch_support',
        'user_agent',
        'url',
        'path',
        'page_title',
        'referrer',
        'language',
        'time_spent_seconds',
        'time_spent_formatted',
        'scroll_percent',
        'max_scroll_percent',
        'visited_at'
    ];

    protected $casts = [
        'page_views' => 'integer',
        'is_new_visitor' => 'boolean',
        'touch_support' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'visited_at' => 'datetime',
    ];



    /**
     * Scope pour les visiteurs d'aujourd'hui
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope pour cette semaine
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    /**
     * Scope pour ce mois
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);
    }

    /**
     * Scope pour les nouveaux visiteurs
     */
    public function scopeNewVisitors($query)
    {
        return $query->where('is_new_visitor', true);
    }

    /**
     * Scope par type d'appareil
     */
    public function scopeByDevice($query, $device)
    {
        return $query->where('device_type', $device);
    }

    /**
     * Scope par pays
     */
    public function scopeByCountry($query, $country)
    {
        return $query->where('country', $country);
    }
}
