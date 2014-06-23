<?php

namespace Test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Test\UserBundle\Entity\Activities;
use Symfony\Component\HttpFoundation\RedirectResponse;
use CCDNForum\ForumBundle\Entity\Board;
use Test\UserBundle\Form\ActivitiesType;
use Test\UserBundle\Form\ModulesType;
use Test\UserBundle\Entity\Modules;

class ActivitiesController extends Controller
{
    public function activities_adminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('UserBundle:activities');

        $liste_activities = $repository->findAll();
        return $this->render('TestBundle:Activity:activity_admin.html.twig', array('liste_activities' => $liste_activities, ));
    }

    public function new_activityAction()
    {
        $activity = new activities();
        /*$em = $this->getDoctrine()
                ->getManager();
        $modules = $em->getRepository('UserBundle:Modules')->findById(27);

        $activity->setType('projet');
        $activity->setName('test');
        $activity->setMaxusers(1000);
        $activity->setDescription('projet');
        $activity->setDatestartinscription(6/15/2009);
        $activity->setDateendinscription(6/15/2009);
        $activity->setDatestartactivity(6/15/2009);
        $activity->setDateendactivity(6/15/2009);
        $activity->setGroupminusers(1);
        $activity->setGroupmaxusers(5);
        $activity->setFile1('projet');
        $activity->setFile2('projet');
        $activity->setFile3('projet');
        $activity->setFile4('projet');
        $activity->setFile5('projet');
        $activity->setModules($modules);
        $em->persist($activity);
        $em->flush();*/
        $form = $this->createForm(new ActivitiesType, $activity);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($activity);
                $em->flush();
                return new RedirectResponse($this->generateUrl('test_activities_admin'));
            }
        }
        return $this->render('TestBundle:Activity:new_activity.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    public function edit_activityAction($id)
    {
        $activity = $this->getDoctrine()
                ->getManager()
                ->getRepository('UserBundle:activities')
                ->find($id);
        $em = $this->getDoctrine()->getManager();
        $formBuilder = $this->createFormBuilder($activities);
        $formBuilder
            ->add('name',                   'text')
            ->add('maxusers',               'integer')
            ->add('type',                   'text')
            ->add('description',            'text')
            ->add('file1',            		'text')
            ->add('file2',            		'text')
            ->add('file3',            		'text')
            ->add('file4',            		'text')
            ->add('file5',            		'text')
            ->add('datestartinscription',   'date')
            ->add('dateendinscription',     'date')
            ->add('datestartactivity',      'date')
            ->add('dateendactivity',        'date')
            ->add('groupminusers',          'integer')
            ->add('$groupmaxusers',         'integer');
        $form = $formBuilder->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em->persist($activity);
                $em->flush();

                $new_categorie = new Category();
                $name = $activity->getName();
                $new_categorie->setName($name);
                $new_categorie->setListOrderPriority('1');
                $repository = $em->getRepository('CCDNForumForumBundle:Forum');
                $forum = $repository->find('1');
                $new_categorie->setForum($forum);
                $em->persist($new_categorie);
                $em->flush();
                return $this->redirect($this->generateUrl('test_activities_admin'));
            }
        }
        return $this->render('TestBundle:Activity:new_activity.html.twig', array(
            'form' => $form->createView(),
            ));
    	return $this->render('TestBundle:Activity:edit.html.twig');
    }

    public function del_activityAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $activity = $em->getRepository('UserBundle:activities')->find($id);
        $repository = $em->getRepository('UserBundle:activities');
        $em->remove($activity);
        $em->flush();
        return $this->redirect($this->generateUrl('test_activities_admin'));
    }
}