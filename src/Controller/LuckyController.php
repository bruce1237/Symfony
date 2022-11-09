<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number', name:'lucky_number', methods: ['GET', 'HEAD'])]
    public function number(Request $request): Response
    {
        $number = random_int(0, 100);

        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');
        var_dump($routeName);
        var_dump($routeParameters);

        $allAttributes = $request->attributes->all();
        var_dump($allAttributes);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}
