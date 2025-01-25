<?php

namespace App\Enum;

use function Symfony\Component\String\s;

enum RolesEnum: string
{
    case Admin = 'admin';
    case User = 'user';
    case Manager = 'manager';
    case VideobookManager = 'videobook_manager';

    public static function labels():array
    {
        return [
            self::Admin->value => 'Admin',
            self::User->value => 'User',
            self::Manager->value => 'Manager',
            self::Manager->value => 'VideobookManager',
        ];
    }


    public function label(): string
    {
        return match($this) {
            self::Admin => 'Admin',
            self::User => 'User',
            self::Manager => 'Manager',
            self::VideobookManager => 'VideobookManager',
        };
    }

}
