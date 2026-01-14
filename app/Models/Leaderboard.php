<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    protected $fillable = [
        'username',
        'rank',
        'score',
        'type',
        'avatar_url',
        'is_active',
    ];

    protected $casts = [
        'rank' => 'integer',
        'score' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk leaderboard aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk type tertentu
     */
    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope untuk top N
     */
    public function scopeTop($query, int $limit = 10)
    {
        return $query->orderBy('rank', 'asc')->orderBy('score', 'desc')->limit($limit);
    }
}
