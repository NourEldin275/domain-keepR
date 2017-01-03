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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class ClientController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/add-new-client/", name="add_new_client")
     * @Security("has_role('ROLE_ADMIN')")
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
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function listClientsAction()
    {
        $clients = $this->getDoctrine()
            ->getRepository('AppBundle:Client')
            ->findAll();
        if ( !$clients ){
            // display an empty list
        }
        return $this->render('client/clients.html.twig', array('clients' => $clients));
    }


    /**
     * @param $id
     * @Route ("/view-client/{id}/", name="view_client", requirements={"id": "\d+"})
     * @Security("has_role('ROLE_ADMIN')")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id)
    {
        $client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($id);
        $domains = $this->getDoctrine()->getRepository('AppBundle:Domain')->findBy(array('client' => $id));
        $contacts = $this->getDoctrine()->getRepository('AppBundle:ClientContact')->findBy(array('client' => $id));
        $websites = $this->getDoctrine()->getRepository('AppBundle:Website')->findBy(array('client' => $id));

        return $this->render('client/view-client.html.twig', array(
            'client' => $client,
            'domains' => $domains,
            'contacts' => $contacts,
            'websites' => $websites,
            ));
    }

    /**
     * @param $id
     * @param $request
     * @Route ("/edit-client/{id}/", name="edit_client", requirements={"id": "\d+"})
     * @Security("has_role('ROLE_ADMIN')")
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

    /**
     * @param $client
     * @Route ("/delete-client/{client}/", name="delete_client")
     * @Security("has_role('ROLE_ADMIN')")
     * @return Response
     */
    public function deleteAction(Client $client){

        if (!$client){
            throw $this->createNotFoundException("Client not found");
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($client);
        $em->flush();
        $this->addFlash('notice','Selected client was deleted!');
        return $this->redirectToRoute('list_clients');
    }


    /**
     * @Route("/ajax/add-client/")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function ajaxAdd(){

        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);

        return $this->render('ajax/add-client.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
