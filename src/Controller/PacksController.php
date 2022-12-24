<?php

namespace App\Controller;

use App\Entity\Pack;
use App\Repository\PackRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PacksController
 * @package App\Controller
 * @Route("/packs", name="packs_")
 */

class PacksController extends AbstractController
{

    private $packRepository;

    public function __construct(MailerInterface $mailer, PackRepository $packRepository)
    {
        parent::__construct($mailer);

        $this->packRepository = $packRepository;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $packs = $this->packRepository->findAll();

        return $this->render("packs/presentation-packs.html.twig", ["packs"=>$packs]);
    }

    /**
     * @Route("/personnaliser", name="custom")
     */
    public function customPack(): Response
    {
        return $this->render("custom-pack/custom.html.twig");
    }

    /**
     * @Route("/present/{slug}", name="present")
     * @return Response
     */
    public function clientPack(Pack $pack): Response
    {

        return $this->render("packs/contenu.html.twig", ["pack"=>$pack]);
    }
}
