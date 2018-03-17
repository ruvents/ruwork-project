<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use App\Entity\Embeddables\TextRuEnTranslations;
use Doctrine\ORM\Mapping as ORM;
use Ruvents\DoctrineBundle\Mapping\Translatable;
use Ruvents\DoctrineBundle\Validator\AssertTranslations;

trait TranslatableTitleTrait
{
    /**
     * @ORM\Embedded("App\Entity\Embeddables\TextRuEnTranslations")
     * @Translatable()
     *
     * @AssertTranslations({
     *     "ru"={@Assert\NotBlank()},
     * })
     *
     * @var TextRuEnTranslations
     */
    private $title;

    public function __toString(): string
    {
        return (string) $this->getTitle();
    }

    public function getTitle(): TextRuEnTranslations
    {
        if (null === $this->title) {
            $this->title = new TextRuEnTranslations();
        }

        return $this->title;
    }
}
