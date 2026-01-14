<?php

namespace App\Models\DragonNest\DnMembership;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DnCashIncome extends Model
{
    /**
     * Connection ke SQL Server Dragon Nest (dnmembership)
     */
    protected $connection = 'sqlsrv_dn_member';

    /**
     * Nama tabel
     */
    protected $table = 'CashIncome';

    /**
     * Primary Key
     */
    protected $primaryKey = 'CashIncomeID';

    /**
     * PK auto increment (IDENTITY)
     */
    public $incrementing = true;

    /**
     * Tipe PK
     */
    protected $keyType = 'int';

    /**
     * Tidak pakai created_at & updated_at
     */
    public $timestamps = false;

    /**
     * Kolom yang boleh diisi (mass assignment)
     */
    protected $fillable = [
        'AccountID',
        'CashIncomeCode',
        'PGCode',
        'PGKey',
        'CashAmount',
        'IncomeDate',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'AccountID' => 'integer',
        'CashIncomeCode' => 'integer',
        'PGCode' => 'integer',
        'CashAmount' => 'integer',
        'IncomeDate' => 'datetime',
    ];

    /**
     * Relationship dengan DnAccount
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(DnAccount::class, 'AccountID', 'AccountID');
    }

    /**
     * Scope: filter berdasarkan order_id (PGKey)
     */
    public function scopeByOrderId($query, string $orderId)
    {
        return $query->where('PGKey', $orderId);
    }

    /**
     * Scope: filter berdasarkan AccountID
     */
    public function scopeByAccountId($query, int $accountId)
    {
        return $query->where('AccountID', $accountId);
    }

    /**
     * Cek apakah order_id sudah pernah di-process
     */
    public static function hasBeenProcessed(string $orderId): bool
    {
        return static::byOrderId($orderId)->exists();
    }
}
