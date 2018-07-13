<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Upload\Upload;
use Doctrine\ORM\EntityManagerInterface;
use Ruwork\RuworkBundle\Validator\Constraints\RasterImage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class UploadController
{
    private $validator;
    private $manager;

    public function __construct(ValidatorInterface $validator, EntityManagerInterface $manager)
    {
        $this->validator = $validator;
        $this->manager = $manager;
    }

    /**
     * @Route("/admin/upload", name="admin_upload")
     * @Template
     */
    public function __invoke(Request $request): JsonResponse
    {
        $file = $request->files->get('upload');

        $violations = $this->validator->validate($file, [
            new NotNull(),
            new RasterImage(),
        ]);

        if (count($violations) > 0) {
            return new JsonResponse([
                'uploaded' => 0,
                'error' => [
                    'message' => (string) $violations,
                ],
            ]);
        }

        $upload = new Upload($file);
        $this->manager->persist($upload);
        $this->manager->flush();

        return new JsonResponse([
            'uploaded' => 1,
            'fileName' => basename($upload->getPath()),
            'url' => '/'.$upload->getPath(),
        ]);
    }
}
