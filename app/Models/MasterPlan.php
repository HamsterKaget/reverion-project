<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterPlan extends Model
{
    protected $fillable = [
        'name',
        'price_idr',
        'discount_price_idr',
        'price_usd',
        'price_discount_usd',
        'item',
        'amount',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price_idr' => 'decimal:2',
        'discount_price_idr' => 'decimal:2',
        'price_usd' => 'decimal:2',
        'price_discount_usd' => 'decimal:2',
        'amount' => 'decimal:2',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Relationship dengan TopupTransaction
     */
    public function topupTransactions(): HasMany
    {
        return $this->hasMany(TopupTransaction::class, 'plan_id');
    }

    /**
     * Scope untuk paket aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Ambil harga berdasarkan currency
     */
    public function getPrice(string $currency): float
    {
        if ($currency === 'IDR') {
            return (float) ($this->discount_price_idr ?? $this->price_idr);
        }
        
        return (float) ($this->price_discount_usd ?? $this->price_usd);
    }
}
