<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Upload\Upload;
use Ruwork\UploadBundle\Form\Type\DoctrineUploadType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class UploadType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'class' => Upload::class,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return DoctrineUploadType::class;
    }
}
