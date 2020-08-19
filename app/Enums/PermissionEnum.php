<?php

namespace App\Enums;

class PermissionEnum
{
    const READ      = 1;

    const WRITE     = 2;

    const EXECUTE   = 3;


    public static function base()
    {
        return [
            self::READ      => '可讀取',
            self::WRITE     => '可寫入',
            self::EXECUTE   => '可執行',
        ];
    }
}