<?php

declare(strict_types=1);

namespace App\Entity\Upload;

use Doctrine\ORM\Mapping as ORM;
use Ruwork\UploadBundle\Metadata\Annotations\Attribute;
use Ruwork\UploadBundle\Metadata\Annotations\Path;
use Ruwork\UploadBundle\Source\Handler\AttributesProviderInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Upload\UploadRepository")
 */
class Upload
{
    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     *
     * @Path
     *
     * @var string
     */
    private $path = '';

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @Attribute(AttributesProviderInterface::CLIENT_NAME)
     *
     * @var null|string
     */
    private $title;

    public function __toString(): string
    {
        return $this->title ?? $this->path ? basename($this->path) : '';
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }
}
