<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User\User;
use Ruwork\ManualAuthBundle\ManualAuthTokens;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

final class MainAuthenticator
{
    private $manualAuthTokens;

    public function __construct(ManualAuthTokens $manualAuthTokens)
    {
        $this->manualAuthTokens = $manualAuthTokens;
    }

    public function authenticate(User $user): void
    {
        $token = new UsernamePasswordToken($user, $user->getPassword(), 'main', $user->getRoles());
        $this->manualAuthTokens->set('main', $token);
    }
}
