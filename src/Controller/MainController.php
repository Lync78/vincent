<?php

namespace App\Controller;

use App\Factory\MailFactory;
use App\Form\FormContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceRepository;
use App\Repository\CategoryRepository;
use App\Factory\ContactFactory;

class MainController extends AbstractController
{
    private $serviceRepository;
    private $categoryRepository;

    public function __construct(ServiceRepository $serviceRepository, CategoryRepository $categoryRepository, MailerInterface $mailer)
    {
        $this->categoryRepository = $categoryRepository;
        $this->serviceRepository = $serviceRepository;
        parent::__construct($mailer);
    }

    #[Route("/",name:"homepage")]
    public function homepage(): Response
    {

        $list = [1,2,3,4];

        foreach ($list as $value){
            $data[] = $this->serviceRepository->findBy(["category"=>$value,"actif"=>true]);

            if ($value == 1){
                $creations = $this->serviceRepository->findBy(["category"=>1,"actif"=>true]);
            }
            elseif ($value == 2){
                $gjv = $this->serviceRepository->findBy(["category"=>2, "actif"=> true]);
            }

            elseif ($value == 3){
                $gentreprise = $this->serviceRepository->findBy(["category"=>3,"actif"=>true]);
            }

            else {
                $option = $this->serviceRepository->findBy(["category"=>4,"actif"=>true]);
            }
        }

        $services = [];

        foreach ($data as $value){
            foreach ($value as $service){
                $services[] = $service;
            }
        }
        $packs = $this->serviceRepository->findBy(["category"=>5]);

        $data = [
            "packs"=>$packs,
            "services" => $services,
            "creations" => $creations,
            "gjv"=> $gjv,
            "entreprise" => $gentreprise,
            "option" => $option,
        ];

        return $this->render("main/index.html.twig", $data);
    }



    /**
     * @Route("/partenariat", name="partenariat")
     */
    public function partenariat(): Response{
        return $this->render("partenariat/index.html.twig");
    }

    /**
     * @Route("/contact", name="contact")
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function contact(Request $request): Response{

        $contact = new ContactFactory();

        $form = $this->createForm(FormContactType::class, $contact);

        $form->handleRequest($request);

        if ($this->getValidForm($form)){
            $mail = new MailFactory($contact,$this->mail);
            $mail->client();
            $mail->mail();

            $this->addFlash("sucess", "Votre message a bien été envoyé.");
        }

        if ($this->getValidIsNotForm($form)){
            $this->addFlash("error", "Le message n'a pas été envoyé");
        }

        if ($this->getValidForm($form) OR $this->getValidIsNotForm($form)){
            return $this->redirectToRoute("contact");
        }

        return $this->render("contact/index.html.twig",['form'=>$form->createView(), "actif" => "contact"]);
    }

    /**
     * @Route("/presentation", name="xunidesign")
     */
    public function xunidesign(): Response
    {

        return $this->render("xunidesign/index.html.twig", []);
    }


    /**
     * @return Response
     */
    #[Route(path: '/reponse', name:'reponse')]
    public function reponse(): Response
    {
        return $this->render("contact/reponse.html.twig");
    }



}
