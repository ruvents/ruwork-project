<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait RemovableTrait
{
    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    protected $removed = false;

    public function isRemoved(): bool
    {
        return $this->removed;
    }

    public function setRemoved(bool $removed)
    {
        $this->removed = $removed;

        return $this;
    }
}
