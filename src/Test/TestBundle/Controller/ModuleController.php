<?php

namespace Test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Test\UserBundle\Entity\Modules;
use Symfony\Component\HttpFoundation\RedirectResponse;
use CCDNForum\ForumBundle\Entity\Category;

class ModuleController extends Controller
{
    public function modules_adminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('UserBundle:Modules');

        $liste_modules = $repository->findAll();
        return $this->render('TestBundle:Module:modules_admin.html.twig', array('liste_modules' => $liste_modules, ));
    }

    public function new_moduleAction()
    {
        $module = new Modules();
        $formBuilder = $this->createFormBuilder($module);
        $formBuilder
            ->add('name',                   'text')
            ->add('maxusers',               'integer')
            ->add('description',            'text')
            ->add('datestartinscription',   'date')
            ->add('dateendinscription',     'date')
            ->add('datestartmodule',        'date')
            ->add('dateendmodule',          'date')
            ->add('credits',                'integer');
        $form = $formBuilder->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($module);
                $em->flush();

                $new_categorie = new Category();
                $name = $module->getName();
                $new_categorie->setName($name);
                $new_categorie->setListOrderPriority('1');
                $repository = $em->getRepository('CCDNForumForumBundle:Forum');
                $forum = $repository->find('1');
                $new_categorie->setForum($forum);
                $em->persist($new_categorie);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice','Module crée!');
                return new RedirectResponse($this->generateUrl('test_modules_admin'));
            }
        }
        return $this->render('TestBundle:Module:new_module.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    public function edit_moduleAction($id)
    {
        $module = $this->getDoctrine()
                ->getManager()
                ->getRepository('UserBundle:Modules')
                ->find($id);
        $em = $this->getDoctrine()->getManager();
        $formBuilder = $this->createFormBuilder($module);
        $formBuilder
            ->add('name',                   'text')
            ->add('maxusers',               'integer')
            ->add('description',            'text')
            ->add('datestartinscription',   'date')
            ->add('dateendinscription',     'date')
            ->add('datestartmodule',        'date')
            ->add('dateendmodule',          'date')
            ->add('credits',                'integer');
        $form = $formBuilder->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em->persist($module);
                $em->flush();

                $new_categorie = new Category();
                $name = $module->getName();
                $new_categorie->setName($name);
                $new_categorie->setListOrderPriority('1');
                $repository = $em->getRepository('CCDNForumForumBundle:Forum');
                $forum = $repository->find('1');
                $new_categorie->setForum($forum);
                $em->persist($new_categorie);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice','Module éditée!');
                return $this->redirect($this->generateUrl('test_modules_admin'));
            }
        }
        return $this->render('TestBundle:Module:new_module.html.twig', array(
            'form' => $form->createView(),
            ));
    	return $this->render('TestBundle:Module:edit.html.twig');
    }

    public function del_moduleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $module = $em->getRepository('UserBundle:Modules')->find($id);
        $repository = $em->getRepository('UserBundle:Modules');
        $em->remove($module);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice','Suppression bien enregistrer!');
        return $this->redirect($this->generateUrl('test_modules_admin'));
    }
}