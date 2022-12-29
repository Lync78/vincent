<?php

namespace App\Controller;

use App\Entity\Service;
use App\Factory\MailFactory;
use App\Form\FormContactType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

use App\Factory\ContactFactory;

class MainController extends AbstractController
{

    public function __construct(MailerInterface $mailer, ManagerRegistry $managerRegistry)
    {
        parent::__construct($mailer, $managerRegistry);
    }

    #[Route("/",name:"homepage")]
    public function homepage(): Response
    {

        $list = [1,2,3,4];

        foreach ($list as $value){
            $data[] = $this->getManager()->getRepository(Service::class)->findBy(["category"=>$value,"actif"=>true]);

            if ($value == 1){
                $creations = $this->getManager()->getRepository(Service::class)->findBy(["category"=>1,"actif"=>true]);
            }
            elseif ($value == 2){
                $gjv = $this->getManager()->getRepository(Service::class)->findBy(["category"=>2, "actif"=> true]);
            }

            elseif ($value == 3){
                $gentreprise = $this->getManager()->getRepository(Service::class)->findBy(["category"=>3,"actif"=>true]);
            }

            else {
                $option = $this->getManager()->getRepository(Service::class)->findBy(["category"=>4,"actif"=>true]);
            }
        }

        $services = [];

        foreach ($data as $value){
            foreach ($value as $service){
                $services[] = $service;
            }
        }
        $packs = $this->getManager()->getRepository(Service::class)->findBy(["category"=>5]);

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

    #[Route("/partenariat", name: "partenariat")]
    public function partenariat(): Response{
        return $this->render("partenariat/index.html.twig");
    }

    /**
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    #[Route("/contact", name: "contact")]
    public function contact(Request $request): Response{

        $contact = new ContactFactory();

        $form = $this->createForm(FormContactType::class, $contact);

        $form->handleRequest($request);

        if ($this->getValidForm($form)){
            $mail = new MailFactory($contact,$this->mailer);
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

    #[Route("/presentation", name: "xunidesign")]
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
