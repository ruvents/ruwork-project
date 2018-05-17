<?php

declare(strict_types=1);

namespace App\Security;

use Ruwork\ManualAuthBundle\ManualAuthTokens;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;

final class MainAuthenticator
{
    private $manualAuthTokens;

    public function __construct(ManualAuthTokens $manualAuthTokens)
    {
        $this->manualAuthTokens = $manualAuthTokens;
    }

    public function authenticate(UserInterface $user): void
    {
        $token = new UsernamePasswordToken($user, $user->getPassword(), 'main', $user->getRoles());
        $this->manualAuthTokens->set('main', $token);
    }
}
