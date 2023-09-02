<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    // {max?9}: make the max optional with default value of 9
    #[Route('/lucky/number/{max?9}', name: 'lucky_number', methods: ['GET', 'HEAD'])]
    public function number(Request $request, int $max, LoggerInterface $logger): Response
    {
        $logger->info("We are logging");
        $number = random_int(0, $max);

//        generate url for the named router found in routes.yml
        $url = $this->generateUrl('blog_list_default', ['page' => 100]);
        var_dump($url);

        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');
        var_dump($routeName);
        var_dump($routeParameters);

        $allAttributes = $request->attributes->all();
        var_dump($allAttributes);

//        redirects to the router named: 'blog_list_default'
//        return $this->redirectToRoute('blog_list_default');

//        redirectToRoute is a shortcut for:
//        return new RedirectResponse($this->generateUrl('blog_list_default'));

//// does a permanent HTTP 301 redirect
//        return $this->redirectToRoute('blog_list_default', [], 301);
////        use php constants instead of hardcoded numbers
//        return $this->redirectToRoute('blog_list_default',[],Response::HTTP_MOVED_PERMANENTLY);

//        redirect to a route with parameters
//        return $this->redirectToRoute('blog_list_default', ['page' => 99]);

//        redirects to a route and maintains the original query string parameters
//        return $this->redirectToRoute('blog_list_default',$request->query->all());

//        redirect to the current route(e.g. for Post/Redirect/Get pattern):
//        return $this->redirectToRoute($request->attributes->get('_route'));

//redirect externally
//        return  $this->redirect('http://google.com');


        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
