<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadCount extends Model
{
    protected $fillable = [
        'key',
        'count',
    ];

    protected $casts = [
        'count' => 'integer',
    ];

    /**
     * Get or create the main download count
     */
    public static function getMain(): self
    {
        return self::firstOrCreate(
            ['key' => 'main'],
            ['count' => 1300]
        );
    }

    /**
     * Increment download count
     */
    public static function incrementCount(): int
    {
        $downloadCount = self::getMain();
        $downloadCount->increment('count');
        return $downloadCount->count;
    }

    /**
     * Get current count
     */
    public static function getCount(): int
    {
        $downloadCount = self::getMain();
        return $downloadCount->count;
    }
}
