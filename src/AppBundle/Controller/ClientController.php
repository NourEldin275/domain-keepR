<?php

namespace AppBundle\Controller;

use AppBundle\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;


class ClientController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/add-new-client/", name="add_new_client")
     */
    public function newAction(Request $request)
    {
        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();

            $em->persist($client);

            $em->flush();

            $this->addFlash('notice', 'client saved successfully');
            return $this->redirectToRoute('list_clients');

        }

        return $this->render('client/add-client.html.twig', array('form' => $form->createView()));
    }

    /**
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


    /**
     * @param $id
     * @Route ("/view-client/{id}/", name="view_client", requirements={"id": "\d+"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id)
    {
        $client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($id);
        $domains = $this->getDoctrine()->getRepository('AppBundle:Domain')->findBy(array('client' => $id));

        return $this->render('client/view-client.html.twig', array('client' => $client, 'domains' => $domains));
    }

    /**
     * @param $id
     * @param $request
     * @Route ("/edit-client/{id}/", name="edit_client", requirements={"id": "\d+"})
     * @return Response
     */
    public function editAction($id, Request $request){

        $client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($id);

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            $this->addFlash('notice', 'client saved successfully');
            return $this->redirectToRoute('view_client', array('id' => $id));

        }
        return $this->render('client/edit-client.html.twig', array('form' => $form->createView(), 'client' => $client));
    }
}
