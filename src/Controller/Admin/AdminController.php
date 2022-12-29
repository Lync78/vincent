<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


#[Route('/backendaccess', name: 'admin_')]
class AdminController extends AbstractController
{

    #[Route(path: '/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return  $this->redirectToRoute("admin_dashboard");
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin/security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/admin/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {


        // Nombre de pack,
        // Nombre de photo book present
        // Nombre de photo Carousel
        // Nombre de service graphique entreprise
        // nombre de service grapihsme jeux video
        // Nombre de service graphisme animations
        // nombre de service création et développement
        // Analyse du taffic du site internet

        return $this->render("admin/dashboard/dashboard.html.twig", ["var" => "dashboard"]);
    }

}
