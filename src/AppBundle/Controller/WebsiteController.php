<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Website;
use AppBundle\Form\WebsiteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;


class WebsiteController extends Controller
{
    private $technology_choices = array(
        'WordPress' => 'WordPress',
        'Magento' => 'Magento',
        'Drupal' => 'Drupal',
        'Custom Framework' => 'Custom Framework',
    );

    private $status_choices = array(
        'Live' => 'Live',
        'Under Development' => 'Under Development',
        'Under Maintenance' => 'Under Maintenance',
    );

    /**
     * @param Request $request
     * @Route("/add-new-website/", name="add_new_website")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function newAction(Request $request){

        $website = new Website();

        $form = $this->createForm(WebsiteType::class, $website, array(
            'technology_choices' => $this->technology_choices,
            'status_choices' => $this->status_choices,
        ));
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($website);
            $em->flush();

            $this->addFlash('notice', 'Website added successfully');
            return $this->redirectToRoute('list_websites');
        }

        return $this->render('website/add-website.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/websites/", name="list_websites")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function listWebsitesAction(){

        $websites = $this->getDoctrine()->getRepository('AppBundle:Website')->findAll();

        return $this->render('websites.html.twig', array('websites' => $websites));

    }


    /**
     * @Route("/view-website/{id}/", name="view_website", requirements={"id": "\d+"})
     * @Security("has_role('ROLE_DEV')")
     * @param $id
     * @return Response
     */
    public function viewAction($id){

        $website = $this->getDoctrine()->getRepository('AppBundle:Website')->find($id);

        if ( !$website ){
            throw $this->createNotFoundException("Website doesn't exist");
        }

        return $this->render('website/view-website.html.twig', array('website' => $website));

    }
}
