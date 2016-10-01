<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListDomainsController extends Controller
{
    /**
     * @Route ("/domains/", name="list_domains")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listDomainsAction()
    {
        $domains = $this->getDoctrine()->getRepository('AppBundle:Domain')->findAll();

        if ( !$domains ){
            // do something
        }
        return $this->render('domains.html.twig', array('domains' => $domains));
    }
}
