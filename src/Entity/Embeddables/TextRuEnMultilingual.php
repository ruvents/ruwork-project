<?php

declare(strict_types=1);

namespace App\Entity\Embeddables;

use Doctrine\ORM\Mapping as ORM;
use Ruwork\DoctrineBehaviorsBundle\Multilingual\AbstractMultilingual;

/**
 * @ORM\Embeddable
 */
final class TextRuEnMultilingual extends AbstractMultilingual
{
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $ru;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $en;

    public function __construct(string $ru = null, string $en = null)
    {
        parent::__construct();
        $this->ru = $ru;
        $this->en = $en;
    }

    public function __toString(): string
    {
        return (string) $this->getCurrent();
    }

    public function getRu(): ?string
    {
        return $this->ru;
    }

    public function setRu(?string $ru)
    {
        $this->ru = $ru;

        return $this;
    }

    public function getEn(): ?string
    {
        return $this->en;
    }

    public function setEn(?string $en)
    {
        $this->en = $en;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getLocales(): array
    {
        return [
            'ru',
            'en',
        ];
    }
}
