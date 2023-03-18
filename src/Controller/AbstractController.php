<?php


namespace App\Controller;


use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Mailer\MailerInterface;

abstract class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    public function __construct(
        protected MailerInterface $mailer,
        protected ManagerRegistry $managerRegistry
    ){}

    /**
     * @param FormInterface $form
     * @return bool
     */
    protected function getValidForm(FormInterface $form): bool
    {
        return $form->isSubmitted() AND $form->isValid();
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    protected function getValidIsNotForm(FormInterface $form): bool
    {
        return $form->isSubmitted() AND !$form->isValid();
    }

    /**
     * @return \Doctrine\Persistence\ObjectManager
     */
    protected function getManager(){
        return $this->managerRegistry->getManager();
    }


}
