<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number', name:'lucky_number', methods: ['GET', 'HEAD'])]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}
