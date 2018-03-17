<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait VisibleTrait
{
    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    private $visible = true;

    public function isVisible(): bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible)
    {
        $this->visible = $visible;

        return $this;
    }
}
