<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TopupTransaction extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'username',
        'email',
        'plan_id',
        'coupon_id',
        'affiliator_id',
        'price',
        'discount_amount',
        'final_price',
        'currency',
        'bonus_amount',
        'commission_amount',
        'status',
        'midtrans_transaction_id',
        'midtrans_payment_type',
        'midtrans_response',
        'snap_token',
        'settlement_time',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'final_price' => 'decimal:2',
        'bonus_amount' => 'decimal:2',
        'commission_amount' => 'decimal:2',
        'midtrans_response' => 'array',
        'settlement_time' => 'datetime',
    ];

    /**
     * Relationship dengan User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship dengan MasterPlan
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(MasterPlan::class, 'plan_id');
    }

    /**
     * Relationship dengan MasterCoupon
     */
    public function coupon(): BelongsTo
    {
        return $this->belongsTo(MasterCoupon::class, 'coupon_id');
    }

    /**
     * Relationship dengan MasterAffiliator
     */
    public function affiliator(): BelongsTo
    {
        return $this->belongsTo(MasterAffiliator::class, 'affiliator_id');
    }

    /**
     * Relationship dengan TopupTransactionLog
     */
    public function logs(): HasMany
    {
        return $this->hasMany(TopupTransactionLog::class, 'transaction_id');
    }

    /**
     * Buat log entry untuk transaksi
     */
    public function createLog(string $action, ?string $status = null, ?string $message = null, ?array $metadata = null, ?string $ipAddress = null, ?string $userAgent = null): TopupTransactionLog
    {
        return $this->logs()->create([
            'action' => $action,
            'status' => $status ?? $this->status,
            'message' => $message,
            'metadata' => $metadata,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
        ]);
    }

    /**
     * Cek apakah transaksi sudah settled
     */
    public function isSettled(): bool
    {
        return in_array($this->status, ['settlement', 'capture']);
    }

    /**
     * Cek apakah transaksi pending
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
}
