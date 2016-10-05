<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use AppBundle\Form\DomainType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Domain;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class DomainController extends Controller
{
    private $hosting_choices = array('Ultimate' => 'ultimate', 'Basic' => 'Basic', 'Custom' => 'Custom');


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
        foreach ($clients as $client){
            $client_choices[$client->getName()] = $client->getId();
        }

        /*$form = $this->createFormBuilder($domain)
            ->add('domain', TextType::class)
            ->add('registrar', TextType::class)
            ->add('renewal_date', DateType::class)
            ->add('cp_url', TextType::class)
            ->add('cp_username', TextType::class)
            ->add('cp_password', TextType::class)
            ->add('hosting_package', ChoiceType::class, array('choices' => $hosting_choices, 'label' => 'Hosting Package'))
            ->add('client', ChoiceType::class, array('choices' => $client_choices, 'label' => 'Choose a client', 'mapped' => false))
            ->add('save', SubmitType::class, array('label' => 'Add domain'))
            ->getForm();*/

        $form = $this->createForm(DomainType::class, $domain, array(
            'client_choices' => $client_choices,
            'hosting_choices' => $this->hosting_choices,
        ));

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
        
        return $this->render('domain/add-domain.html.twig', array('form' => $form->createView()));
    }

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

    /**
     * @param $id
     * @param $request
     * @Route ("/edit-domain/{id}/", name="edit_domain", requirements={"id": "\d+"})
     * @return Response
     */
    public function editAction($id, Request $request){

        $domain = $this->getDoctrine()->getRepository('AppBundle:Domain')->find($id);
        $domain_client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($domain->getClient()->getId());

        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->findAll();
        $client_choices = array();
        foreach ($clients as $client){
            $client_choices[$client->getName()] = $client->getId();
        }

        $form = $this->createForm(DomainType::class, $domain, array(
            'hosting_choices' => $this->hosting_choices,
            'client_choices'  => $client_choices,
        ));

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($domain);
            $em->persist($domain_client);
            $em->flush();
            $this->addFlash('notice', 'domain saved successfully');
            return $this->redirectToRoute('view_domain', array('id' => $id));

        }

        return $this->render('domain/edit-domain.html.twig', array(
            'form' => $form->createView(),
            'domain' => $domain,
            'client' => $domain_client,
        ));
    }


    /**
     * @param $id
     * @Route("/view-domain/{id}/", name="view_domain", requirements={"id": "\d+"})
     * @return Response
     */
    public function viewAction($id){

        $domain = $this->getDoctrine()->getRepository('AppBundle:Domain')->find($id);
        $client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($domain->getClient()->getId());

        return $this->render('domain/view-domain.html.twig', array('domain' => $domain, 'client' => $client));
    }


    /**
     * @param $domain
     * @Route("/delete-domain/{domain}/", name="delete_domain")
     * @return Response
     */
    public function deleteAction(Domain $domain){

        if (!$domain){
            throw $this->createNotFoundException('Domain not found');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($domain);
        $em->flush();

        $this->addFlash('notice','Selected domain was deleted!');
        return $this->redirectToRoute('list_domains');
    }

}
