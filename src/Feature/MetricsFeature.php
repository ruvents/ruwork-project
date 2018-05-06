<?php

declare(strict_types=1);

namespace App\Feature;

use Ruwork\FeatureBundle\FeatureInterface;

final class MetricsFeature implements FeatureInterface
{
    private $available;

    public function __construct(bool $available)
    {
        $this->available = $available;
    }

    /**
     * {@inheritdoc}
     */
    public static function getName(): string
    {
        return 'metrics';
    }

    /**
     * {@inheritdoc}
     */
    public function isAvailable(): bool
    {
        return $this->available;
    }
}
