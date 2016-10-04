<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ClientController extends Controller
{
    /**
     * @param $id
     * @Route ("/view-client/{id}", name="view_client", requirements={"id": "\d+"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id)
    {
        $client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($id);
        $domains = $this->getDoctrine()->getRepository('AppBundle:Domain')->findBy(array('client' => $id));


//        foreach ($domains as $domain){
//            $domain->get
//        }
//        return $this->render(var_dump($domains));


        return $this->render('client/client-view.html.twig', array('client' => $client, 'domains' => $domains));
    }
}
