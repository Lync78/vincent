<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Entity\Service;
use App\Factory\CategoryServiceFactory;
use App\Form\DeleteType;
use App\Form\ServicesType;
use App\Repository\CategoryRepository;
use App\Repository\ServiceRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: "/backendaccess/admin/service", name: "admin_service_")]
class ServiceController extends AbstractController
{
    public function __construct(
        MailerInterface $mailer,
        ManagerRegistry $managerRegistry,
        private ServiceRepository $serviceRepository,
        private CategoryRepository $categoryRepository
    )
    {
        parent::__construct($mailer,$managerRegistry);
    }


    #[Route('/', name: 'service')]
    public function index(): Response
    {

        $first = $this->serviceRepository->findByService([1,2,3,4],2);

        $second = $this->serviceRepository->findByService([6,7],2);

        $formsFirst = [];
        $deletesFirst = [];

        $formsSecond = [];
        $deletesSecond = [];

        $categorys = new CategoryServiceFactory($this->categoryRepository);

        /** @var Service $service */
        foreach ($first as $service){
            $form = $this->createForm(ServicesType::class, $service, [
                "action" => $this->generateUrl("admin_service_formulaire", ["id" => $service->getId()]),
                "method" => "POST",
                "attr" => ["class" => "d-none"],
                "list" => $categorys->list(),
            ]);

            $deleteForm = $this->createForm(DeleteType::class, null, [
                "action" => $this->generateUrl("admin_service_delete", ["id" => $service->getId()]),
                "method" => "POST",
                "attr" => ["class" => "d-none form-delete"],
            ]);

            $deletesFirst[] = $deleteForm->createView();
            $formsFirst[] = $form->createView();
        }

        foreach ($second as $service){
            $form = $this->createForm(ServicesType::class, $service, [
                "action" => $this->generateUrl("admin_service_formulaire", ["id" => $service->getId()]),
                "method" => "POST",
                "attr" => ["class" => "d-none"],
                "list" => $categorys->list(),
            ]);

            $deleteForm = $this->createForm(DeleteType::class, null, [
                "action" => $this->generateUrl("admin_service_delete", ["id" => $service->getId()]),
                "method" => "POST",
                "attr" => ["class" => "d-none form-delete"],
            ]);

            $deletesSecond[] = $deleteForm->createView();
            $formsSecond[] = $form->createView();
        }

        return $this->render('admin/service/index.html.twig', ['var' => 'service', "first" => $first,"second" => $second, "formsFirst" => $formsFirst,"deletesFirst" => $deletesFirst, "formsSecond" => $formsSecond, "deletesSecond" => $deletesSecond]);
    }

    #[Route(path: "/traitement/{id}", name: "formulaire")]
    public function getTraitementService(Service $service,Request $request)
    {

        $categorys = new CategoryServiceFactory($this->categoryRepository);
        $form = $this->createForm(ServicesType::class, $service, [
            "action" => $this->generateUrl("admin_service_formulaire", ["id" => $service->getId()]),
            "method" => "POST",
            "attr" => ["class" => "d-none"],
            "list" => $categorys->list(),
        ]);

        $form->handleRequest($request);

        if ($this->getValidForm($form)){
            $this->getManager()->persist($service);
            $this->getManager()->flush();
            $this->addFlash("success","La modification a bien été effectué");
        }

        else{
            $this->addFlash("error", "La modification n'a pas été effectué");
        }

        return $this->redirectToRoute("admin_service_service");

    }

    #[Route(path: "/delete/{id}", name: "delete")]
    public function delete(Service $service, Request $request){
        $form = $this->createForm(DeleteType::class, null, [
            "action" => $this->generateUrl("admin_service_delete", ["id" => $service->getId()]),
            "method" => "POST",
            "attr" => ["class" => "d-none form-delete"],
        ]);

        $form->handleRequest($request);

        if ($this->getValidForm($form)){
            $service->setActif(false);
            $service->setTitle("emplacement ". $service->getPosition());
            $service->setDescription("Description");

            $this->serviceRepository->add($service);

            $this->addFlash("success","La suppression a bien été effectué");
        }

        else {
            $this->addFlash("error","La suppression n'a pas été effectué");
        }

        return $this->redirectToRoute("admin_service_service");
    }
}
