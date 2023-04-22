<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Entity\Exclusivite;
use App\Form\DeleteType;
use App\Form\ExclusiviteType;
use App\Repository\ExclusiviteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;




#[Route(path: "/backendaccess/admin/exclusivite", name: "admin_exclusivite_")]
class ExclusiviteController extends AbstractController
{

    public function __construct(
        MailerInterface $mailer,
        ManagerRegistry $managerRegistry,
        private ExclusiviteRepository $exclusiviteRepository
    )
    {
        parent::__construct($mailer,$managerRegistry);
    }


    #[Route('/', name: 'read')]
    public function index(FormFactoryInterface $formFactory): Response
    {
        $exclusivites = $this->exclusiviteRepository->findBy([],["id" => "ASC"],4);

        $forms = [];
        $deletesForms = [];

        foreach ($exclusivites as $exclusivite){
            $form = $formFactory->createNamed('exclusivite_'. $exclusivite->getId(), ExclusiviteType::class, $exclusivite,
                [
                    "action" => $this->generateUrl("admin_exclusivite_edit",["id" => $exclusivite->getId()]),
                    "method" => "POST",
                    "information" => $exclusivite->getId(),
                ]
            );

            $delete = $this->createForm(DeleteType::class,null,
                [
                    "action" => $this->generateUrl("admin_exclusivite_delete",["id" => $exclusivite->getId()]),
                    "method" => "POST",
                ],
            );


            $forms[] = $form->createView();
            $deletesForms[] = $delete->createView();
        }


        return $this->render("admin/exclusivite/exclusivite.html.twig",["var" => "exclusivite","forms" => $forms, "deletes" => $deletesForms,"exclusivites" => $exclusivites]);
    }

    #[Route(path: "/edit/{id}", name: "edit")]
    public function edit(Exclusivite $exclusivite, Request $request){
        $form = $this->createForm(ExclusiviteType::class,$exclusivite);

        $form->handleRequest($request);

        if ($this->getValidForm($form)){
            // déplacer la photo
        }
    }

    #[Route(path: "/delete/{id}", name: "delete")]
    public function delete(Exclusivite $exclusivite, Request $request){
        $form = $this->createForm(DeleteType::class);

        $form->handleRequest($request);

        if ($this->getValidForm($form)){
            $exclusivite->setTitle("titre nouveauté");
            $exclusivite->setImg("home-tableau.png");
            $this->exclusiviteRepository->save($exclusivite,true);
        }

        return $this->redirectToRoute("admin_exclusivite_read");
    }
}
