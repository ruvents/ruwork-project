<?php

declare(strict_types=1);

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

final class IndexController
{
    /**
     * @Route("/", name="index")
     * @Template
     */
    public function __invoke()
    {
    }
}
