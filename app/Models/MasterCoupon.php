<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MasterCoupon extends Model
{
    protected $table = 'master_coupon';

    protected $fillable = [
        'code',
        'discount_amount',
        'discount_type',
        'expiry_date',
        'is_active',
        'description',
    ];

    protected $casts = [
        'discount_amount' => 'decimal:2',
        'expiry_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk coupon aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk coupon yang masih valid (tidak expired)
     */
    public function scopeValid($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('expiry_date')
              ->orWhere('expiry_date', '>', now());
        });
    }

    /**
     * Hitung diskon berdasarkan harga
     */
    public function calculateDiscount(float $price): float
    {
        if ($this->discount_type === 'percentage') {
            return $price * ($this->discount_amount / 100);
        }
        
        return min($this->discount_amount, $price); // Fixed discount, tidak boleh lebih dari harga
    }

    /**
     * Cek apakah coupon masih valid
     */
    public function isValid(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        if ($this->expiry_date && $this->expiry_date->isPast()) {
            return false;
        }

        return true;
    }
}
