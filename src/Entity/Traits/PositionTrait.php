<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait PositionTrait
{
    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $position = 0;

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position)
    {
        $this->position = $position;

        return $this;
    }
}
