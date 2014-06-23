<?php

namespace Test\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MailController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserBundle:Mail:index.html.twig', array('name' => $name));
    }

    public function mailAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:User')->findAll();

        return $this->render('UserBundle:Mail:mail.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function sendAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:User')->findAll();
        $mails = $request->request->get("id");
        $message = \Swift_Message::newInstance();
        $message->setSubject("Bonjour");
        $message->setFrom("dbenoit@student.42.fr");
        $message->setTo($mails);
        // pour envoyer le message en HTML
        $message->setBody("Ceci est un mail.");
        $this->get('mailer')->send($message);
        return $this->render('UserBundle:Mail:mail.html.twig', array('entities' => $entities));
    }
}
