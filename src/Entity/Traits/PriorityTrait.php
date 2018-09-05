<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait PriorityTrait
{
    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $priority = 0;

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority)
    {
        $this->priority = $priority;

        return $this;
    }
}
