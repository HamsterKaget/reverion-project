<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopupTransactionLog extends Model
{
    protected $table = 'topup_transaction_logs';

    protected $fillable = [
        'transaction_id',
        'action',
        'status',
        'message',
        'metadata',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'metadata' => 'array',
        'created_at' => 'datetime',
    ];

    public $timestamps = false; // Hanya pakai created_at

    /**
     * Relationship dengan TopupTransaction
     */
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(TopupTransaction::class, 'transaction_id');
    }
}
