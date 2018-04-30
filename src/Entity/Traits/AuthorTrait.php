<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use App\Entity\User\User;
use Doctrine\ORM\Mapping as ORM;
use Ruwork\DoctrineBehaviorsBundle\Mapping\Author;

trait AuthorTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Author
     *
     * @var User
     */
    private $author;

    public function getAuthor(): User
    {
        return $this->author;
    }
}
