<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $fillable = [
        'name',
        'description',
        'amount',
        'order_id',
        'user_id',
        'email',
        'status',
        'midtrans_transaction_id',
        'midtrans_payment_type',
        'midtrans_response',
        'settlement_time',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
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
     * Cek apakah donation sudah settled
     */
    public function isSettled(): bool
    {
        return in_array($this->status, ['settlement', 'capture']);
    }

    /**
     * Cek apakah donation pending
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
}
