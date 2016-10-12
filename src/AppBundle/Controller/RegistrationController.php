<?php
/**
 * Created by PhpStorm.
 * User: ikneb
 * Date: 12.10.2016
 * Time: 11:35
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public  function registerAction(Request $request){

        //build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        //handle the submit (will only happen on post)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setRoles('ROLE_SUPER_ADMIN');

            // save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('homepage');
        }
        $validator = $this->get('validator');
        $error = $validator->validate($user);
        return $this->render(
            'registration/register.html.twig',
            array(
                'form' => $form->createView(),
                'error' => $error,
            )
        );
    }
}