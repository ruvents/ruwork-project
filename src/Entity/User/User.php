<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Entity\Traits\AutoIdTrait;
use App\Security\Roles;
use Doctrine\ORM\Mapping as ORM;
use Ruwork\RuworkBundle\Security\UserTrait;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\User\UserRepository")
 */
class User implements UserInterface
{
    use UserTrait;
    use AutoIdTrait;

    /**
     * @ORM\Column(type="string")
     *
     * @var null|string
     */
    private $email;

    /**
     * @ORM\Column(type="simple_array")
     *
     * @var array
     */
    private $roles = [Roles::USER];

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;

        return $this;
    }
}
