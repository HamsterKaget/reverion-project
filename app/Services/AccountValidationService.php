<?php

namespace App\Services;

use App\Models\User;
use App\Models\DragonNest\DnMembership\DnAccount;

class AccountValidationService
{
    /**
     * Cek apakah email sudah terdaftar di User model
     *
     * @param string $email
     * @return bool
     */
    public function emailExists(string $email): bool
    {
        return User::where('email', $email)->exists();
    }

    /**
     * Cek apakah username sudah diambil di DnAccount model
     *
     * @param string $username
     * @return bool
     */
    public function usernameExists(string $username): bool
    {
        return DnAccount::where('AccountName', $username)->exists();
    }

    /**
     * Cek apakah email sudah terdaftar (alias method untuk konsistensi)
     *
     * @param string $email
     * @return bool
     */
    public function isEmailRegistered(string $email): bool
    {
        return $this->emailExists($email);
    }

    /**
     * Cek apakah username sudah diambil (alias method untuk konsistensi)
     *
     * @param string $username
     * @return bool
     */
    public function isUsernameTaken(string $username): bool
    {
        return $this->usernameExists($username);
    }

    /**
     * Cek apakah username exist di DnAccount untuk topup
     * Untuk topup, username harus exist (berbeda dengan register yang harus tidak exist)
     *
     * @param string $username
     * @return bool
     */
    public function usernameExistsForTopup(string $username): bool
    {
        return DnAccount::where('AccountName', $username)->exists();
    }
}
