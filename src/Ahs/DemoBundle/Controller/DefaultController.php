<?php

namespace Ahs\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use Ahs\DemoBundle\Entity\Address,
    Ahs\DemoBundle\Entity\City,
    Ahs\DemoBundle\Entity\Email,
    Ahs\DemoBundle\Entity\User;
use Ahs\DemoBundle\Form\Type\UserType;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $session = new Session();
        $session->start();

        if (!$session->has('user/emails')) {
            $session->set('user/emails', array(new Email()));
        }
        $emails = $session->get('user/emails');

        if (!$session->has('user/addresses')) {
            $session->set('user/addresses', array(new Address()));
        }
        $addresses = $session->get('user/addresses');

        $options = array();
        if ($request->isMethod('POST')) {
            if ($request->request->has('addEmail')) {
                array_push($emails, new Email());
                $session->set('user/emails', $emails);
            }

            if ($request->request->has('addAddress')) {
                array_push($addresses, new Address());
                $session->set('user/addresses', $addresses);
            }

            if ($request->request->has('addEmail'  ) ||
                $request->request->has('addAddress')) {
                $options = array('validation_groups' => 'no_validation'); // Assigning a nonexistent validation group results in no validation being performed.
            }

        }

        $user = new User();
        foreach ($emails as $email) {
            $user->addEmails($email);
        }
        foreach ($addresses as $address) {
            $user->addAdr($address);
        }

        $form = $this->createForm(new UserType(), $user, $options);

        if ($request->isMethod('POST')) { // Case sensitive!
            $form->bind($request);
            //var_dump($request->request->get('addEmail')); exit;

            if (!$request->request->has('addEmail'  ) &&
                !$request->request->has('addAddress')) {
                if ($form->isValid()) {
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($user); // Manage instance of entity User for persistance.
                    // Other included entities are automatically managed for persistance if the cascade={"pesist"} option is set in the User entity!
                    $entityManager->flush();        // Persist all managed entities.
                    $session->remove('user/emails');
                    $session->remove('user/addresses');

                    return $this->redirect($this->generateUrl('ahs_demo_homepage'));
                }
            }
        }

        return $this->render('AhsDemoBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}