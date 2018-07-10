<?php

declare(strict_types=1);

namespace App\Repository\Upload;

use App\Entity\Upload\Upload;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Ruwork\UploadBundle\Doctrine\Repository\UploadFinderInterface;

/**
 * @method null|Upload find($id, $lockMode = null, $lockVersion = null)
 * @method null|Upload findOneBy(array $criteria, array $orderBy = null)
 * @method Upload[]    findAll()
 * @method Upload[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class UploadRepository extends ServiceEntityRepository implements UploadFinderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Upload::class);
    }

    /**
     * {@inheritdoc}
     */
    public function findOneByPath(string $path): ?Upload
    {
        return $this->findOneBy(['path' => $path]);
    }
}
