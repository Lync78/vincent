<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Entity\Service;
use App\Form\ServicesType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: "/backendaccess/admin/service", name: "admin_service_")]
class ServiceController extends AbstractController
{
    public function __construct(MailerInterface $mailer, ManagerRegistry $managerRegistry)
    {
        parent::__construct($mailer,$managerRegistry);
    }


    #[Route('/', name: 'service')]
    public function index(): Response
    {

        $services = $this->getManager()->getRepository(Service::class)->findAll();

        $forms = [];

        foreach ($services as $service){
            $form = $this->createForm(ServicesType::class, $service);

            $forms[] = $form->createView();
        }

        dump($forms);

        return $this->render('admin/service/index.html.twig', ['var' => 'service', "services" => $services, "forms" => $forms]);
    }

}
