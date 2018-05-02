<?php

declare(strict_types=1);

namespace App\Security;

final class Attributes
{
    public const ROLE_USER = 'ROLE_USER';
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    public const ROLE_CAN_IMPERSONATE = 'ROLE_CAN_IMPERSONATE';

    private function __construct()
    {
    }
}
