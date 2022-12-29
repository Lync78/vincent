<?php

namespace App\Controller;

use App\Entity\Pack;
use App\Repository\PackRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PacksController
 * @package App\Controller
 */
#[Route("/packs", name: "packs_")]
class PacksController extends AbstractController
{


    public function __construct(MailerInterface $mailer, ManagerRegistry $managerRegistry)
    {
        parent::__construct($mailer, $managerRegistry);

    }

    #[Route("/", name: "index")]
    public function index(): Response
    {

        $test = new Pack();
        dump($test);

        $packs = $this->getManager()->getRepository(Pack::class)->findAll();

        return $this->render("packs/presentation-packs.html.twig", ["packs"=>$packs]);
    }

    #[Route("/personnaliser", name: "custom")]
    public function customPack(): Response
    {
        return $this->render("custom-pack/custom.html.twig");
    }

    /**
     * @return Response
     */
    #[Route("/present/{slug}", name: "present")]
    public function clientPack(Pack $pack): Response
    {

        return $this->render("packs/contenu.html.twig", ["pack"=>$pack]);
    }
}
