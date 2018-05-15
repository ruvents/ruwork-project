<?php

declare(strict_types=1);

namespace App\Entity\Upload;

use Doctrine\ORM\Mapping as ORM;
use Ruwork\UploadBundle\Entity\AbstractUpload;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Upload\UploadRepository")
 */
class Upload extends AbstractUpload
{
    public function isPersisted(): bool
    {
        return null !== $this->path;
    }
}
