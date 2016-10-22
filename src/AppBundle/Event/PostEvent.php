<?php

/**
 * Created by PhpStorm.
 * User: ikneb
 * Date: 21.10.2016
 * Time: 23:10
 */
namespace AppBundle\Event;


use Symfony\Component\EventDispatcher\Event;

class PostEvent extends Event
{
    private $user;

    /**
     * PostEvent constructor.
     * @param $user
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

}