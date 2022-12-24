<?php

namespace App\Controller;

use App\Repository\PriceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ServicesController
 * @package App\Controller
 */

#[Route("/services")]
class ServicesController extends AbstractController
{

    private $priceRepository;

    public function __construct(PriceRepository $priceRepository)
    {

        $this->priceRepository = $priceRepository;


    }

    #[Route("/", name:"services")]
    public function services(): Response
    {
        return $this->render("service/index.html.twig");
    }

    #[Route("/creations-developpement", name:"creations-developpement")]
    public function creationsDeveloppement():Response
    {
        $prices = $this->priceRepository->findBy(["category_id"=>1]);


        return $this->render("service/creations.html.twig", ["prices" => $prices]);
    }

    #[Route("/graphisme-jeux-videos", name:"graphisme-jeux-videos")]
    public function serviceGraphismeJeuxVideos():Response
    {

        $gjv = $this->priceRepository->findBy(["category_id" => 2]);

        $gav = $this->priceRepository->findBy(["category_id" => 3]);

        //dump($gav);

        return $this->render("service/graphisme-jeux-videos.html.twig", ["prices" => $gjv, 'gav' => $gav]);


    }

    #[Route("/graphisme-entreprise", name:"graphisme-entreprise")]
    public function serviceGraphismeEntreprise():Response
    {

        return $this->render("service/graphisme-entreprise.html.twig");
    }

}
