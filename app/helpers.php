<?php

if (!function_exists('email_exists')) {
    /**
     * Cek apakah email sudah terdaftar di User model
     *
     * @param string $email
     * @return bool
     */
    function email_exists(string $email): bool
    {
        return app(\App\Services\AccountValidationService::class)->emailExists($email);
    }
}

if (!function_exists('username_exists')) {
    /**
     * Cek apakah username sudah diambil di DnAccount model
     *
     * @param string $username
     * @return bool
     */
    function username_exists(string $username): bool
    {
        return app(\App\Services\AccountValidationService::class)->usernameExists($username);
    }
}

if (!function_exists('is_email_registered')) {
    /**
     * Cek apakah email sudah terdaftar (alias untuk email_exists)
     *
     * @param string $email
     * @return bool
     */
    function is_email_registered(string $email): bool
    {
        return email_exists($email);
    }
}

if (!function_exists('is_username_taken')) {
    /**
     * Cek apakah username sudah diambil (alias untuk username_exists)
     *
     * @param string $username
     * @return bool
     */
    function is_username_taken(string $username): bool
    {
        return username_exists($username);
    }
}
