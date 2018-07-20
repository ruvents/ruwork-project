<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Entity\Traits\AutoIdTrait;
use App\Security\Roles;
use Doctrine\ORM\Mapping as ORM;
use Ruwork\RuworkBundle\Security\SecurityUserTrait;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\User\UserRepository")
 */
class User implements UserInterface, EquatableInterface, \Serializable
{
    use AutoIdTrait;
    use SecurityUserTrait;

    /**
     * @ORM\Column(type="string")
     *
     * @var null|string
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     *
     * @var null|string
     */
    private $role = Roles::USER;

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

    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles(): array
    {
        return [$this->role];
    }

    public function setRole(?string $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isEqualTo(UserInterface $user)
    {
        return $user instanceof static &&
            $user->getId() === $this->getId() &&
            $user->getRoles() === $this->getRoles();
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize([$this->id, $this->email, $this->role]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        [$this->id, $this->email, $this->role] = unserialize($serialized);
    }
}
