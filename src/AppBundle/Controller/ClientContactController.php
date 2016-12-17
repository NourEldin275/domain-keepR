<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ClientContact;
use AppBundle\Form\ClientContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ClientContactController extends Controller
{

    /**
     * @param Request $request
     * @Route("/clients/add-new-contact/", name="add_new_client_contact")
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_DEV')")
     */
    public function newAction(Request $request){

        $contact = new ClientContact();

        $form = $this->createForm(ClientContactType::class, $contact);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $this->addFlash('notice', 'Contact saved successfully');
        }

        return $this->render('client/contact/add-contact.html.twig', array('form' => $form->createView()));
    }


    /**
     * @param Request $request
     * @return Response
     * @Security("has_role('ROLE_DEV')")
     * @Route("/clients/edit-contact/{id}/", requirements={"id": "\d+"}, name="edit_client_contact")
     */
    public function editAction(Request $request, $id){

        $contact = $this->getDoctrine()->getRepository('AppBundle:ClientContact')->find($id);

        if (!$contact){
            throw $this->createNotFoundException("Contact Not Found");
        }

        $form = $this->createForm(ClientContactType::class, $contact);
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $this->addFlash('notice', 'Contact Saved Successfully');
            return $this->redirectToRoute('view_client', array( 'id' => $contact->getClient()->getId() ) );
        }

        return $this->render('client/contact/edit-contact.html.twig', array(
            'form' => $form->createView(),
            'contact' => $contact
        ));
    }


    /**
     * @param ClientContact $contact
     * @return Response
     * @Security("has_role('ROLE_DEV')")
     * @Route("/clients/delete-contact/{contact}/", name="delete_client_contact")
     */
    public function deleteAction(ClientContact $contact){

        if (!$contact){
            throw $this->createNotFoundException("Contact Not Found");
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($contact);
        $em->flush();
        $this->addFlash('notice','Selected contact was deleted!');
        return $this->redirectToRoute('list_clients');
    }
}
