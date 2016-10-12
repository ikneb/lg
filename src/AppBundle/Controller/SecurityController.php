<?php
/**
 * Created by PhpStorm.
 * User: ikneb
 * Date: 10.10.2016
 * Time: 16:42
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends Controller
{

    /**
     * @Route("/", name="login")
     */
    public function loginAction(){

        $helper = $this->get('security.authentication_utils');

        //get the last login error if there is one
        $error = $helper->getLastAuthenticationError();
        $lastUsername = $helper->getLastUsername();
            //last username entered by the user
            return $this->render('security/login.html.twig', array(
                'last_username' => $lastUsername,
                'error' => $error,
            ));
    }

    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in app/config/security.yml
     *
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('This should never be reached!');
    }
}