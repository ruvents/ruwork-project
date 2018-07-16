<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Ruwork\RuworkBundle\Validator\Constraints\Alias;
use Symfony\Component\Validator\Constraints as Assert;

trait AliasTrait
{
    /**
     * @ORM\Column(type="string", unique=true)
     *
     * @Assert\NotBlank()
     * @Alias()
     *
     * @var null|string
     */
    private $alias;

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(?string $alias)
    {
        $this->alias = $alias;

        return $this;
    }
}
