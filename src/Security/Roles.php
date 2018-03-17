<?php

declare(strict_types=1);

namespace App\Security;

final class Roles
{
    const ROLE_USER = 'ROLE_USER';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    const ROLE_CAN_IMPERSONATE = 'ROLE_CAN_IMPERSONATE';

    private function __construct()
    {
    }
}
