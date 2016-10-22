<?php

namespace AppBundle\Listener;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class SendMailListener
{
    /**
     *  Swift mailer instance
     * @type Swift_Mailer
     **/
    private $mailServise;


    /**
     *  Template engine(twig)
     * @type
     **/
    private $templateEngine;

    /**
     *  Sender address.
     * @type string
     **/
    private $sender;

    /**
     * Admin email address.
     * @type string
     **/
    private $adminEmail;

    public function  __construct($sender, $adminEmail){
        $this->sender = $sender;
        $this->adminEmail = $adminEmail;
    }

    public function sendRegistrationMail()
    {

    }

}