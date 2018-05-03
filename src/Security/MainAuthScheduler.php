<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User\User;
use Ruwork\ManualAuthBundle\ManualAuthScheduler;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

final class MainAuthScheduler
{
    private $scheduler;

    public function __construct(ManualAuthScheduler $scheduler)
    {
        $this->scheduler = $scheduler;
    }

    public function authenticate(User $user): void
    {
        $token = new UsernamePasswordToken($user, $user->getPassword(), '', $user->getRoles());
        $this->scheduler->schedule('main', $token);
    }
}
