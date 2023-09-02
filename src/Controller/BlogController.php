<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
//    #[Route('/blog/{page}', name: 'blog_show')]
    public function list(int $page): Response
    {
        //$post is the object whose slug matches the routing parameter

        return new Response(
            '<html><body>Lucky PAGE: ' . $page . '</body></html>'
        );

    }

}