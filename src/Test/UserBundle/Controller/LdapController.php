<?php

namespace Test\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LdapController extends Controller
{
	public function indexAction($filter = "-")
	{
		$ldap = ldap_connect("ldap.42.fr");
		if ($ldap)
		{
			//echo "Connected to LDAP ";
		}
		else
		{
			echo "Could NOT connect to LDAP ";
		}
		if (ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3))
		{
			//echo "LDAPv3 OK ";
		}
		else
		{
			echo "LDAP V3 NOTOK ";
		}
		//$ldapres = ldap_bind($ldap, "uid=dbenoit, ou=2013, ou=people, dc=42, dc=fr", "");
		$ldap_res = ldap_bind($ldap);
		if ($ldap_res)
		{
			//echo "Bind : ".$ldap_res." ";
		}
		else
		{
			echo "Bind FAILED ";
		}
		if ($filter === "-")
		{
			$filter = $this->getRequest()->get('ldapfilter');
			if (!$filter)
			{
				$filter = "uid=*";
			}
		}
		$dn = "ou=2013,ou=people,dc=42,dc=fr";
		$result=ldap_search($ldap, $dn, $filter);
		$numentries = ldap_count_entries($ldap, $result);
		//echo "NumEntries : ".$numentries." ";
		$entities=ldap_get_entries($ldap, $result);
		//print_r($entities);
		if ($numentries == 1)
		{
			$infos = array();
			if (isset($entities[0]['uid']))
				$infos['uid'] = $entities[0]['uid'][0];
			if (isset($entities[0]['last-name']))
				$infos['lastname'] = $entities[0]['last-name'][0];
			if (isset($entities[0]['first-name']))
				$infos['firstname'] = $entities[0]['first-name'][0];
			if (isset($entities[0]['homedirectory']))
				$infos['homedir'] = $entities[0]['homedirectory'][0];
			if (isset($entities[0]['picture']))
				$infos['picture'] = base64_encode($entities[0]['picture'][0]);
			$infos['emails'] = array();
			if (isset($entities[0]['alias']))
			{
				foreach($entities[0]['alias'] as $key => $alias)
				{
					if ($key !== "count")
					{
						$infos['emails'][] = $alias;
					}
				}
			}
			ldap_close($ldap);
			return $this->render('UserBundle:Ldap:ldapuser.html.twig', array('filter' => $filter, 'infos' => $infos));
		}
		else if ($numentries > 1)
		{
			$infos = array();
			foreach($entities as $userkey => $user)
			{
				if ($userkey !== "count")
				{
					$emails = array();
					foreach($user['alias'] as $key => $alias)
					{
						if ($key !== "count")
						{
							$emails[] = $alias;
						}
					}
					$infos[] = array(
					'uid' => $user['uid'][0],
					'lastname' => $user['last-name'][0],
					'firstname' => $user['first-name'][0],
					'homedir' => $user['homedirectory'][0],
					'emails' => $emails
					);
					
					
				}
			}
			ldap_close($ldap);
			return $this->render('UserBundle:Ldap:ldaplist.html.twig', array('filter' => $filter, 'infos' => $infos));
		}
		ldap_close($ldap);
		return $this->render('UserBundle:Ldap:ldaplist.html.twig', array('filter' => $filter, 'infos' => array()));
	}
}