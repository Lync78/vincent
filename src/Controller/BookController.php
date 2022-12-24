<?php

namespace App\Controller;

use App\Form\FormBookType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/book-present/{slug?}", name="present")
     */
    public function present(Request $request, string $slug = null): Response
    {

        $form = $this->createForm(FormBookType::class);

        $form->handleRequest($request);

        if ($this->getValidForm($form)){

            return $this->redirectToRoute("present", $form->get('hidden')->getData() === "categories" ? [] : ["slug"=>$form->get("hidden")->getData()]);
        }

        $data = ['form'=>$form->createView(), "slug" => $slug === null ? "categories" : $slug];

        return $this->render("present/index.html.twig",$data);
    }
}
