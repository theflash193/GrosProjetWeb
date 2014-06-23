<?php

namespace Test\UserBundle\Listener;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Test\UserBundle\Controller;
use Test\UserBundle\Entity\User;
use Test\UserBundle\Entity\Logs;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\DependencyInjection\ContainerInterface;

class KernelRequestListener
{
	protected $userlocale = 'en';
	protected $container;
	protected $em;
	
	function __construct(ContainerInterface $container, EntityManager $em)
	{
		$this->container = $container;
		$this->em = $em;
	}

	protected function getUserLocale()
	{
		//$user = new User();
		//print_r($user);
		//return $user->getLocale();
		return $this->userlocale;
	}
	
	protected function setUserLocale($locale)
	{
		$this->userlocale = $locale;
	}

	public function onKernelRequest(GetResponseEvent $event)
	{
		$request = $event->getRequest();
		$routename = $request->get("_route");
		$routepath = $request->getPathInfo();
		// Users in the database 
		//$entities = $this->em->getRepository('UserBundle:User')->findAll();
		$session = $request->getSession();
		$curuser = "";
		if(is_object($this->container->get('security.context')->getToken()))
			$curuser = $this->container->get('security.context')->getToken()->getUser();
		
		$logs = new Logs();
		if (is_object($curuser))
			$logs->setUsername($curuser->getUserName());
		else
			$logs->setUsername("-");
		$logs->setAction("page");
		$logs->setInfos("Routename : ".$routename." - Routepath : ".$routepath);
		$logs->setDate(new \DateTime);
		$this->em->persist($logs);
		$this->em->flush();

		if (is_object($curuser))
			$locale = $curuser->getLocale();
		else
			$locale = "";

		if ($locale == "")
		{
			if (isset($_SESSION['userlocale']) && $_SESSION['userlocale']  == 'fr')
				$locale = 'fr';
			else if (isset($_SESSION['userlocale']) && $_SESSION['userlocale'] == 'en')
				$locale = 'en';
			else if (isset($_SESSION['userlocale']) && $_SESSION['userlocale'] == 'de')
				$locale = 'de';
			else
			{
				$locale = $request->cookies->get('userlocale');
				if (!($locale))
				{
					$locale = 'fr';
				}
			}
		}

		$this->setUserLocale($locale);
		
		//$cookie = new Cookie('userlocale', $this->getUserLocale());
		//$response = new Response();

		$_SESSION['userlocale'] = $this->getUserLocale();
		//$response->headers->setCookie($cookie);
		$request->setLocale($this->getUserLocale());
	}

	public function onKernelResponse(FilterResponseEvent $event)
	{
		//$this->setUserLocale();
		//$request = $this->getRequest();
		//$request->setLocale("en");
	}
}