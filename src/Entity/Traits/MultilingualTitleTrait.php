<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use App\Entity\Embeddables\TextRuEnMultilingual;
use Doctrine\ORM\Mapping as ORM;
use Ruwork\DoctrineBehaviorsBundle\Mapping\Multilingual;

trait MultilingualTitleTrait
{
    /**
     * @ORM\Embedded("App\Entity\Embeddables\TextRuEnMultilingual")
     * @Multilingual
     *
     * @var TextRuEnMultilingual
     */
    private $title;

    public function __toString(): string
    {
        return (string) $this->getTitle();
    }

    public function getTitle(): TextRuEnMultilingual
    {
        if (null === $this->title) {
            $this->title = new TextRuEnMultilingual();
        }

        return $this->title;
    }
}
