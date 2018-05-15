<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Upload\Upload;
use Ruwork\UploadBundle\Entity\AbstractUpload;
use Ruwork\UploadBundle\Form\DataMapper\UploadFactoryInterface;
use Ruwork\UploadBundle\Form\Type\UploadType as BaseUploadType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class UploadType extends AbstractType implements UploadFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('uploadedFile')
            ->add('uploadedFile', FileType::class, ['mapped' => false] + $options['file_options']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => Upload::class,
                'factory' => $this,
                'file_options' => [],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return BaseUploadType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function createUpload(UploadedFile $uploadedFile, \Traversable $forms): AbstractUpload
    {
        return new Upload($uploadedFile);
    }
}
