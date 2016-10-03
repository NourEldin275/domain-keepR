<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Domain;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Choice;

class AddDomainController extends Controller
{
    /**
     * @Route ("/add-new-domain", name="add_new_domain")
     * @param $request
     * @return Response
     */
    public function newAction(Request $request)
    {
        $domain = new Domain();
        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->findAll();
        $client_choices = array();
        $hosting_choices = array('Ultimate' => 'ultimate', 'Basic' => 'Basic', 'Custom' => 'Custom');
        foreach ($clients as $client){
            $client_choices[$client->getName()] = $client->getId();
        }

        $form = $this->createFormBuilder($domain)
            ->add('domain', TextType::class)
            ->add('registrar', TextType::class)
            ->add('renewal_date', DateType::class)
            ->add('cp_url', TextType::class)
            ->add('cp_username', TextType::class)
            ->add('cp_password', TextType::class)
            ->add('hosting_package', ChoiceType::class, array('choices' => $hosting_choices, 'label' => 'Hosting Package'))
            ->add('client', ChoiceType::class, array('choices' => $client_choices, 'label' => 'Choose a client', 'mapped' => false))
            ->add('save', SubmitType::class, array('label' => 'Add domain'))
            ->getForm();

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){

            // get chosen client
            $client_id = $form->get('client')->getData();

            // get client from the database using submitted id
            $domain_client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($client_id);


            $domain->setClient($domain_client);

            // getting current date
            $date = new \DateTime('now');
            $date->format('Y-m-d');

            $domain->setDateAdded($date );
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($domain_client);
            $em->persist($domain);

            // actually executes the queries (i.e. the INSERT query)
            $em->flush();

            $this->addFlash('notice','Domain saved successfully');

            return $this->redirectToRoute('list_domains');
        }
        
        return $this->render('addNew/domain.html.twig', array('form' => $form->createView()));
    }
}
