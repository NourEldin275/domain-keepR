<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use AppBundle\Form\DomainType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Domain;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DomainController extends Controller
{
    private $hosting_choices = array('Ultimate' => 'ultimate', 'Basic' => 'Basic', 'Custom' => 'Custom');


    /**
     * @Route ("/add-new-domain/", name="add_new_domain")
     * @Security("has_role('ROLE_ADMIN')")
     * @param $request
     * @return Response
     */
    public function newAction(Request $request)
    {
        $domain = new Domain();

//        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->findAll();
//        $client_choices = array();
//        foreach ($clients as $client){
//            $client_choices[$client->getName()] = $client->getId();
//        }

        $form = $this->createForm(DomainType::class, $domain, array(
            //'client_choices' => $client_choices,
            'hosting_choices' => $this->hosting_choices,
        ));

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){

            // get chosen client
            //$client_id = $form->get('client')->getData();

            // get client from the database using submitted id
            //$domain_client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($client_id);


            //$domain->setClient($domain_client);

            // getting current date
            $date = new \DateTime('now');
            $date->format('Y-m-d');

            $domain->setDateAdded($date );
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            //$em->persist($domain_client);
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
     * @Security("has_role('ROLE_ADMIN')")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listDomainsAction()
    {
        $domains = $this->getDoctrine()->getRepository('AppBundle:Domain')->findAll();

        if ( !$domains ){
            // do something
        }

        // Creating an array to store each domain status

        return $this->render('domains.html.twig', array('domains' => $domains));
    }

    /**
     * @param $id
     * @param $request
     * @Route ("/edit-domain/{id}/", name="edit_domain", requirements={"id": "\d+"})
     * @Security("has_role('ROLE_ADMIN')")
     * @return Response
     */
    public function editAction($id, Request $request){

        $domain = $this->getDoctrine()->getRepository('AppBundle:Domain')->find($id);
        $domain_client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($domain->getClient()->getId());

//        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->findAll();
//        $client_choices = array();
//        foreach ($clients as $client){
//            $client_choices[$client->getName()] = $client->getId();
//        }

        $form = $this->createForm(DomainType::class, $domain, array(
            'hosting_choices' => $this->hosting_choices,
            //'client_choices'  => $client_choices,
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
            //'client' => $domain_client,
        ));
    }


    /**
     * @param $id
     * @param $request
     * @Route("/view-domain/{id}/", name="view_domain", requirements={"id": "\d+"})
     * @Security("has_role('ROLE_ADMIN')")
     * @return Response
     */
    public function viewAction($id, Request $request){

        $domain = $this->getDoctrine()->getRepository('AppBundle:Domain')->find($id);

        if ( !$domain ){
            throw $this->createNotFoundException('Domain with ID: ' . $id . ' was not found');
        }

        $client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($domain->getClient()->getId());

        // Creating a form to renew domain
        $renewal_choices = array('1 Year' => '1', '2 Years' => '2', '3 Years' => '3');
        $renewal_period = array('period' =>  '1');

        $form = $this->createFormBuilder($renewal_period)
            ->add('period', ChoiceType::class, array('choices' => $renewal_choices, 'label' => 'Renewal Period'))
            ->add('save', SubmitType::class, array('label' => 'Apply Renewal Period'))
            ->getForm();

        // processing form submission
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {

            // data is an array with "period" key
            $data = $form->getData();

            $current_domain_renewal_date = $domain->getRenewalDate();

            $renewed_period = $current_domain_renewal_date->add(new \DateInterval('P'. $data['period'] .'Y'));
            $domain->setRenewalDate($renewed_period);

            $em = $this->getDoctrine()->getManager();
            $em->persist($domain);
            $em->flush();

            $this->addFlash('notice', 'Domain renewed for '. $data['period'] . ' years');
        }

        
        return $this->render('domain/view-domain.html.twig', array('domain' => $domain, 'client' => $client, 'form' => $form->createView()));
    }


    /**
     * @param $domain
     * @Route("/delete-domain/{domain}/", name="delete_domain")
     * @Security("has_role('ROLE_ADMIN')")
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
