<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function homepageAction(){
                return $this->render('default/home.html.twig' );
    }

    /**
     * @Route("/admin", name="index")
     */
    public function indexAction(Request $request)
    {

        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->find(1);
        $contact = $this->getDoctrine()
            ->getRepository('AppBundle:Contact')
            ->find($user->getContact());
        if (!$user) {
            throw $this->createNotFoundException('No product found');
        }

        // replace this example code with whatever you need
        return $this->render('default/admin.html.twig',array('user' => $user,'contact' => $contact)
            );
    }




}
