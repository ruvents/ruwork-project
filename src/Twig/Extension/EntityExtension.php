<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class EntityExtension extends AbstractExtension
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('repository', function (string $class): ObjectRepository {
                if (!class_exists($class)) {
                    $class = 'App\\Entity\\'.$class;
                }

                return $this->manager->getRepository($class);
            }),
        ];
    }
}
