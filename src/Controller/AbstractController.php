<?php


namespace App\Controller;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\Mailer\MailerInterface;

abstract class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    protected $mail;

    public function __construct(MailerInterface $mailer)
    {
        $this->mail = $mailer;
    }

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


}
