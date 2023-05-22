<?php

namespace App\Controller;

use App\Repository\PriceRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/services")]
class ServicesController extends AbstractController
{

    public function __construct(
        private PriceRepository $priceRepository,
        MailerInterface $mailer,
        ManagerRegistry $managerRegistry
    )
    {
        parent::__construct($mailer,$managerRegistry);
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

        return $this->render("service/graphisme-jeux-videos.html.twig", ["prices" => $gjv, 'gav' => $gav]);
    }

    #[Route("/graphisme-entreprise", name:"graphisme-entreprise")]
    public function serviceGraphismeEntreprise():Response
    {
        return $this->render("service/graphisme-entreprise.html.twig");
    }



    #[Route("/graphisme-animation", name: "graphisme-animation")]
    public function serviceGraphismeAnimation(): Response
    {
        return $this->render("service/graphisme-animations.html.twig");
    }

    public function getServicePrice(int $id): Response
    {

        # id = 1 => creations
        # id = 2 => gaming
        # id = 3 => animation
        # id = 4 => entreprise
        $donnees = $this->priceRepository->findBy(["category_id" => $id]);

        $i = 0;
        $j = 0;
        if (count($donnees) > 1){
            while($i < count($donnees)){
                $i += 3;
                $j++;
            }
        }
        else {
            $j = 1;
        }

        dump($j);

        return $this->render("service/layout-service.html.twig",["prices" => $donnees,"ligne" => $j]);
    }

}
