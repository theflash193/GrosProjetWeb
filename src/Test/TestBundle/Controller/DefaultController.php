<?php

namespace Test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Test\UserBundle\Entity\User;
use Test\UserBundle\Entity\Notes;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use CCDNForum\ForumBundle\Entity\Category;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render("TestBundle:Test:index.html.twig");
    }

    public function localeAction()
    {
        return $this->render("TestBundle:Test:locale.html.twig");
    }

    public function setlocaleAction($locale)
    {
        
		
        $em = $this->getDoctrine()->getManager();

        $curuser = "";
        if(is_object($this->container->get('security.context')->getToken()))
            $curuser = $this->container->get('security.context')->getToken()->getUser();
        if (is_object($curuser))
        {
            $curuser->setLocale($locale);
            $em->persist($curuser);
            $em->flush();
        }


		$cookie = new Cookie('userlocale', $locale);
		$response = new Response();
        $response->headers->setCookie($cookie);

		$_SESSION['userlocale'] = $locale;
		
        $request = $this->getRequest();
		$request->setLocale($locale);
        return $this->render("TestBundle:Test:setlocale.html.twig");
    }

    public function impersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("UserBundle:User")->findAll();
        return $this->render("TestBundle:Test:impers.html.twig", array("users" => $users));
    }

    public function logsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logs = $em->getRepository("UserBundle:Logs")->findAll();
        return $this->render("TestBundle:Test:logs.html.twig", array("logs" => $logs));
    }

    public function notes_adminAction()
    {
        $entity = new Notes();
        $formBuilder = $this->createFormBuilder($entity);
        $formBuilder
            ->add('baremeid','integer')
            ->add('userid','integer')
            ->add('note','integer');
        $form = $formBuilder->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('test_homepage'));
            }
        }
        return $this->render('TestBundle:Test:notes_admin.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function activities_adminAction()
    {
        return $this->render('TestBundle:Test:activities_admin.html.twig');
    }

    public function bareme_adminAction()
    {
        return $this->render('TestBundle:Test:bareme_admin.html.twig');
    }

    public function modulesAction()
    {
        return $this->render("TestBundle:Test:modules.html.twig");
    }

    public function notesAction()
    {
        return $this->render("TestBundle:Test:notes.html.twig");
    }
}
