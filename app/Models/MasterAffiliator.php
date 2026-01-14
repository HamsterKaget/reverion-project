<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterAffiliator extends Model
{
    protected $table = 'master_affiliator';

    protected $fillable = [
        'user_id',
        'kode_referal',
        'total_referrals',
        'total_transactions',
        'total_revenue',
        'total_commission',
    ];

    protected $casts = [
        'total_referrals' => 'integer',
        'total_transactions' => 'integer',
        'total_revenue' => 'decimal:2',
        'total_commission' => 'decimal:2',
    ];

    /**
     * Relationship dengan User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship dengan TopupTransaction
     */
    public function topupTransactions(): HasMany
    {
        return $this->hasMany(TopupTransaction::class, 'affiliator_id');
    }

    /**
     * Update statistik affiliator
     */
    public function incrementStats(float $revenue = 0, float $commission = 0): void
    {
        $this->increment('total_transactions');
        
        if ($revenue > 0) {
            $this->increment('total_revenue', $revenue);
        }
        
        if ($commission > 0) {
            $this->increment('total_commission', $commission);
        }
    }
}
