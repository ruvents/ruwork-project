<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait IdTrait
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     *
     * @var int
     */
    protected $id = 0;

    public function getId(): int
    {
        return $this->id;
    }
}
