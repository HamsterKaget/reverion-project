<?php

namespace App\Models\DragonNest\DnMembership;

use Illuminate\Database\Eloquent\Model;

class DnAccount extends Model
{
    /**
     * Connection ke SQL Server Dragon Nest (dnmembership)
     */
    protected $connection = 'sqlsrv_dn_member';

    /**
     * Nama tabel
     */
    protected $table = 'Accounts';

    /**
     * Primary Key
     */
    protected $primaryKey = 'AccountID';

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
        'AccountName',
        'NxLoginPwd',
        'AccountLevelCode',
        'CharacterCreateLimit',
        'CharacterMaxCount',
        'RegisterDate',
        'PublisherCode',
        'GenderCode',
        'BirthDate',
        'LockFlag',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'RegisterDate' => 'datetime',
        'LastLoginDate' => 'datetime',
        'LastLogoutDate' => 'datetime',
        'BirthDate' => 'date',
        'LockFlag' => 'boolean',
    ];

    /**
     * Scope: akun aktif (tidak lock)
     */
    public function scopeActive($query)
    {
        return $query->where('LockFlag', 0);
    }
}
