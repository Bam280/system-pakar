<?php

namespace App\Enums;

use App\Enums\traits\EnumToArray;

enum UserRole: string
{
    use EnumToArray;

    case ADMIN = 'admin';

    case USER = 'user';

    /**
     * Get all permissions
     * Permissions are defined by role and action
     * Please add new permission here
     *
     * @return array
     */
    public static function permissions() : array
    {
        return [
            'admin-access' => [self::ADMIN],
            'user-access' => [self::USER],
        ];
    }
}