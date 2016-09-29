<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListClientsController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/clients/", name="list_clients")
     */
    public function listClientsAction()
    {
        $clients = $this->getDoctrine()
            ->getRepository('AppBundle:Client')
            ->findAll();
        if ( !$clients ){
            // display an empty list
        }
        return $this->render('clients.html.twig', array('clients' => $clients));
    }
}
