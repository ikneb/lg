<?php
/**
 * Created by PhpStorm.
 * User: ikneb
 * Date: 21.10.2016
 * Time: 22:55
 */

namespace AppBundle\Listener;


use AppBundle\ResumeEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class FlashListener implements  EventSubscriberInterface
{
    private $session;

    /**
     * FlashListener constructor.
     * @param $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public static function getSubscribedEvents()
    {
        return [
            ResumeEvents::POST_CREATED => 'onFlash',
        ];
    }

    public function onFlash($event){

    }
}