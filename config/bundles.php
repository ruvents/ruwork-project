<?php

declare(strict_types=1);

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => ['dev' => true, 'test' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Symfony\Bundle\DebugBundle\DebugBundle::class => ['dev' => true, 'test' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
    Http\HttplugBundle\HttplugBundle::class => ['all' => true],
    Symfony\Bundle\WebServerBundle\WebServerBundle::class => ['dev' => true],
    Hostnet\Bundle\FormHandlerBundle\HostnetFormHandlerBundle::class => ['all' => true],
    Ivory\CKEditorBundle\IvoryCKEditorBundle::class => ['all' => true],
    Nelmio\Alice\Bridge\Symfony\NelmioAliceBundle::class => ['dev' => true],
    Fidry\AliceDataFixtures\Bridge\Symfony\FidryAliceDataFixturesBundle::class => ['dev' => true],
    Hautelook\AliceBundle\HautelookAliceBundle::class => ['dev' => true],
    Ruvents\PaginatorBundle\RuventsPaginatorBundle::class => ['all' => true],
    Ruvents\AdminBundle\RuventsAdminBundle::class => ['all' => true],
    Ruvents\DoctrineFixesBundle\RuventsDoctrineFixesBundle::class => ['all' => true],
    Ruwork\DoctrineBehaviorsBundle\RuworkDoctrineBehaviorsBundle::class => ['all' => true],
    Ruwork\FeatureBundle\RuworkFeatureBundle::class => ['all' => true],
    Ruwork\FilterBundle\RuworkFilterBundle::class => ['all' => true],
    Ruwork\FrujaxBundle\RuworkFrujaxBundle::class => ['all' => true],
    Ruwork\ManualAuthBundle\RuworkManualAuthBundle::class => ['all' => true],
    Ruwork\PolyfillFormDTIBundle\RuworkPolyfillFormDTIBundle::class => ['all' => true],
    Ruwork\ReformBundle\RuworkReformBundle::class => ['all' => true],
    Ruwork\RoutingToolsBundle\RuworkRoutingToolsBundle::class => ['all' => true],
    Ruwork\RuworkBundle\RuworkBundle::class => ['all' => true],
    Ruwork\SynchronizerBundle\RuworkSynchronizerBundle::class => ['all' => true],
    Ruwork\TemplateI18nBundle\RuworkTemplateI18nBundle::class => ['all' => true],
    Ruwork\UploadBundle\RuworkUploadBundle::class => ['all' => true],
];
