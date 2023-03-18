<?php


namespace App\Factory;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Message;
use function Symfony\Component\Translation\t;

class MailFactory
{
    /** @var ContactFactory $contact */
    private $contact;

    /** @var MailerInterface $mailer */
    private $mailer;

    private $isClient = true;
    private $isOwner = true;

    private $adress = "contact@xunidesign.fr";

    public function __construct(ContactFactory $contactFactory, MailerInterface $mailer)
    {
        $this->contact = $contactFactory;
        $this->mailer = $mailer;
    }

    /**
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     * @return bool
     */
    public function client(): bool
    {

        if ($this->contact->isbot()){

            $this->contact->setXunidesign(false);

            $email = (new TemplatedEmail())
                ->from($this->adress)
                ->to(new Address($this->contact->getEmail()))
                ->subject($this->contact->getRaison())
                ->htmlTemplate("email/mail.html.twig")
                ->context([
                    "contact" => $this->contact,
                ])
            ;

            try {
                $this->mailer->send($email);
            }
             catch (TransportExceptionInterface $exception){
                $this->isClient = false;
             }

        }

        else {
            $this->isClient = false;
        }

        return $this->isClient;


    }

    /**
     * @return bool
     */
    public function mail(): bool
    {
        if ($this->contact->isbot()){

            $this->contact->setXunidesign(true);

            $email = (new TemplatedEmail())
                ->from($this->contact->getEmail())
                ->to(new Address($this->adress))
                ->subject($this->contact->getRaison())
                ->htmlTemplate("email/mail.html.twig")
                ->context([
                    "contact" => $this->contact,
                ])
            ;

            try {
                $this->mailer->send($email);
            }
            catch (TransportExceptionInterface $exception){
                $this->isOwner = false;
            }

        }

        else {
            $this->isOwner = false;
        }

        return $this->isOwner;
    }


}