<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Form\AddCarouselType;
use App\Form\ViewCarouselType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/backendaccess/admin/carousel', name: "admin_carousel_")]
class CarouselController extends AbstractController
{
    #[Route('/view', name: 'view')]
    public function view(): Response
    {

        $add = $this->createForm(AddCarouselType::class, null, [
            "action" => $this->generateUrl("admin_carousel_add"),
            "method" => "post"
        ]);

        $view = $this->createForm(ViewCarouselType::class);

        $data = [
            "var" => "carousel",
            "addForm" => $add->createView(),
            "viewForm" => $view->createView(),
        ];

        return $this->render("admin/carousel/carousel.html.twig", $data);
    }

    #[Route('/add', name: 'add')]
    public function add(Request $request): Response
    {

        $add = $this->createForm(AddCarouselType::class, null, [
            "action" => $this->generateUrl("admin_carousel_add"),
            "method" => "post"
        ]);

        $add->handleRequest($request);

        if ($this->getValidForm($add)){

        }

        return $this->redirectToRoute("admin_carousel_view");
    }
}
