<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait NameIdTrait
{
    /**
     * @ORM\Column(type="string")
     * @ORM\Id()
     *
     * @var string
     */
    protected $name;

    public function getName(): string
    {
        return $this->name;
    }
}
