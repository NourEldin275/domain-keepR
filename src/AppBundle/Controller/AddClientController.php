<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddClientController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/add-new-client/", name="add_new_client")
     */
    public function newAction(Request $request)
    {
        $client = new Client();

        $form = $this->createFormBuilder($client)
            ->add('name', TextType::class)
            ->add('email', TextType::class)
            ->add('phone', TextType::class)
            ->add('save', SubmitType::class, array('label' => "Add Client"))
            ->getForm();

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($client);
            // actually executes the queries (i.e. the INSERT query)
            $em->flush();
            return $this->redirectToRoute('client_saved');
        }

        return $this->render('addNew/client.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/add-new-client/success/", name="client_saved")
     */
    public function clientSavedAction(){
        return $this->render('addNew/messages/client-saved.html.twig');
    }
}
