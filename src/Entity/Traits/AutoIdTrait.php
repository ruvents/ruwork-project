<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait AutoIdTrait
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var int
     */
    protected $id;

    public function getId(): int
    {
        if (null === $this->id) {
            throw new \LogicException('Id should not be accessed on non-persisted entity.');
        }

        return $this->id;
    }
}
