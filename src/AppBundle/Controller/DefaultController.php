<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Domain;
use AppBundle\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    /**
     * @param $request
     * @Route("/", name="homepage")
     * @return Response
     */
    public function indexAction(Request $request)
    {


        $securityContext = $this->get('security.authorization_checker');

        if ( !$securityContext->isGranted('IS_AUTHENTICATED_FULLY') ){
            // redirect to to login
            $this->redirectToRoute('login');
        }

        return $this->redirectToRoute('dashboard');
    }

    /**
     * @Route ("/dashboard/", name="dashboard")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function dashboardAction(){

        $domains = $this->getDoctrine()->getRepository('AppBundle:Domain')->findAll();
        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->findAll();

        $new_domains = array();
        $expiring_domains = array();
        $expired_domains = array();

        $today = new \DateTime('now');
        $date_diff = array();
        $domain_date_arr = array();

        foreach ($domains as $domain){

            //[1] get date difference to check for newly added domains
            $date_difference_1 = date_diff($today, $domain->getDateAdded());

            //[1] get domains added in the last 5 days
            if ( $date_difference_1->d < 5 ){
                $new_domains[$domain->getId()] = $domain;
            }

            //[2], [3] get date difference between today and the renewal date to determine if it is expired or about to expire
            $date_difference_2 = date_diff($today, $domain->getRenewalDate());


            //[2] get domains about to expire
            if ( $date_difference_2->format('%a') < '100' ){

                $expiring_domains[$domain->getId()] = $domain; // get the domain
                $date_diff[$domain->getId()] = $date_difference_2->format('%a'); // get how many days are left

                //store the domain and the days it has left in an array
                $domain_date_arr[$domain->getId()] = array(
                    'domain' => $domain,
                    'days_left' => $date_diff[$domain->getId()],
                );
            }

            //[3] get teh domains about to expire
            //$date_difference_2 = $today->diff($domain->getRenewalDate());
            
            if ( $date_difference_2->format('%r%a') < '-1' ){
                $expired_domains[$domain->getId()] = $domain;
            }

        }


        return $this->render('dashboard.html.twig', array(
            'new_domains' => $new_domains,
            //'expiring_domains' => $expiring_domains,
            'expiring_domains_arr' => $domain_date_arr,
            'expired_domains' => $expired_domains,
            'domains' => $domains,
            'clients' => $clients,
            ));
    }

}
