<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Entity\Service;
use App\Factory\CategoryServiceFactory;
use App\Form\ServicesType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
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

        $categorys = new CategoryServiceFactory($this->managerRegistry);

        /** @var Service $service */
        foreach ($services as $service){
            $form = $this->createForm(ServicesType::class, $service, [
                "action" => $this->generateUrl("admin_service_formulaire", ["edit" => $service->getId()]),
                "method" => "POST",
                "attr" => ["class" => "d-none"],
                "list" => $categorys->list(),
            ]);

            $forms[] = $form->createView();
        }


        return $this->render('admin/service/index.html.twig', ['var' => 'service', "services" => $services, "forms" => $forms]);
    }

    #[Route(path: "/traitement/{edit}", name: "formulaire")]
    public function getTraitementService(Service $service,Request $request){

        $form = $this->createForm(ServicesType::class, $service);

        $form->handleRequest($request);

        if ($this->getValidForm($form)){

        }
    }

}
