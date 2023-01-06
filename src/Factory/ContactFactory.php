<?php


namespace App\Factory;


class ContactFactory
{

    /** @var string $miel */
    private string $miel;

    /** @var string $pseudo */
    private string $pseudo;

    /** @var string $raison */
    private string $raison;

    /** @var string $email */
    private string $email;

    /** @var string $message */
    private string $message;

    /**
     * @var bool $xunidesign
     */
    private bool $xunidesign;

    /**
     * @return string
     */
    public function isMiel(): string
    {
        return $this->miel;
    }

    /**
     * @param string $miel
     */
    public function setMiel(string $miel): void
    {
        $this->miel = $miel;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getRaison(): string
    {
        return $this->raison;
    }

    /**
     * @param string $raison
     */
    public function setRaison(string $raison): void
    {
        $this->raison = $raison;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return bool renvoie vrai si il ne s agit pas d'un span pas.
     */
    public function isbot(): bool
    {
        return empty($this->miel);
    }

    /**
     * @return bool
     */
    public function isXunidesign(): bool
    {
        return $this->xunidesign;
    }

    /**
     * @param bool $xunidesign
     */
    public function setXunidesign(bool $xunidesign): void
    {
        $this->xunidesign = $xunidesign;
    }


}