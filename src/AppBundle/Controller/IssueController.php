<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Domain;
use AppBundle\Entity\Hosting;
use AppBundle\Entity\Issue;
use AppBundle\Entity\Website;
use AppBundle\Form\Issues\IssueType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IssueController extends Controller
{
    /**
     * @param Request $request
     * @param Domain $domain
     * @Route("/add-domain-issue/domain_id={domain}/", name="add_domain_issue")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newDomainIssueAction(Request $request, Domain $domain)
    {

        if (!$domain){
            throw $this->createNotFoundException('Could not add a new domain issue. Domain not found.');
        }

        $issue_status_choices = array(
            'Open' => 'Open',
            'On Hold' => 'On Hold',
            'Solved' => 'Solved',
            'Closed' => 'Closed',
        );

        $issue = new Issue();
        $issue->setDomain($domain);

        $form = $this->createForm(IssueType::class, $issue, array(
            'status' => $issue_status_choices,
        ));

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){

            $usr = $this->get('security.token_storage')->getToken()->getUser();
            $issue->setCreatedBy($usr);

            $em = $this->getDoctrine()->getManager();

            $em->persist($issue);
            $em->persist($domain);
            $em->flush();

            $this->addFlash('notice', 'A new issue has been added for the domain: '.$domain->getDomain());

            //Redirect to issue log
            return $this->redirectToRoute('add_issue_log', array('issue' => $issue->getId()));
        }

        return $this->render('issue/domain/add-domain-issue.html.twig', array(
            'form' => $form->createView(),
            'domain' => $domain,
        ));
    }


    /**
     * @param Issue $issue
     * @param Request $request
     * @Route("/edit-issue/{issue}/", name="edit_issue")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editIssueAction(Issue $issue, Request $request){

        if (!$issue){
            throw $this->createNotFoundException('Could not edit issue. Issue not found.');
        }

        $service_name = "";
        $service_type = "";

        if ( $issue->getDomain() != NULL ){
            $service_name = $issue->getDomain()->getDomain();
            $service_type = "Domain";
        }

        elseif ( $issue->getHosting() != NULL ){
            $service_type = "Hosting";
            $service_name = $issue->getHosting()->getDomain()->getDomain();
        }
        elseif ( $issue->getWebsite() != NULL ){
            $service_type = "Website";
            $service_name = $issue->getWebsite()->getWebsiteName();
        }

        $form = $this->createForm(IssueType::class, $issue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();

            $em->persist($issue);
            if ( $issue->getHosting() != NULL ){
                $em->persist($issue->getHosting());
            }
            elseif ( $issue->getDomain() != NULL ){
                $em->persist($issue->getDomain());
            }
            elseif ( $issue->getWebsite() != NULL ){
                $em->persist($issue->getWebsite());
            }

            $em->flush();

            $this->addFlash('notice', 'Issue is updated successfully.');
            return $this->redirectToRoute('add_issue_log', array('issue' => $issue->getId()));
        }

        return $this->render('issue/edit-issue.html.twig', array(
            'form' => $form->createView(),
            'issue' => $issue,
            'service_type' => $service_type,
            'service_name' => $service_name,
        ));
    }

    /**
     * @param Request $request
     * @param Hosting $hosting
     * @Route("/add-hosting-issue/hosting_id={hosting}/", name="add_hosting_issue")
     * @return Response
     */
    public function newHostingIssueAction(Request $request, Hosting $hosting){

        if (!$hosting){
            throw $this->createNotFoundException('Could not add a new hosting issue. hosting not found');
        }

        $issue = new Issue();
        $issue->setHosting($hosting);

        $form = $this->createForm(IssueType::class, $issue);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ){

            $em = $this->getDoctrine()->getManager();

            $usr = $this->get('security.token_storage')->getToken()->getUser();
            $issue->setCreatedBy($usr);

            $em->persist($issue);
            $em->persist($hosting);
            $em->flush();

            $this->addFlash('notice', 'hosting Issue Added successfully.');

            return $this->redirectToRoute('view_hosting', array(
                'hosting' => $hosting->getId(),
            ));
        }

        return $this->render('issue/hosting/add-hosting-issue.html.twig', array(
            'form' => $form->createView(),
            'hosting' => $hosting,
        ));

    }


    /**
     * @param Request $request
     * @param Website $website
     * @Route("/add-website-issue/website_id={website}/", name="add_website_issue")
     * @return Response
     */
    public function newWebsiteIssue(Request $request, Website $website){

        if (!$website){
            throw $this->createNotFoundException('Could not add an issue to website. Website not found');
        }

        $issue = new Issue();
        $issue->setWebsite($website);

        $form = $this->createForm(IssueType::class, $issue);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ){

            $em = $this->getDoctrine()->getManager();

            $usr = $this->get('security.token_storage')->getToken()->getUser();
            $issue->setCreatedBy($usr);

            $em->persist($issue);
            $em->persist($website);
            $em->flush();

            $this->addFlash('notice', 'Website Issue Added successfully.');

            return $this->redirectToRoute('view_website', array(
                'id' => $website->getId(),
            ));
        }

        return $this->render('issue/website/add-website-issue.html.twig', array(
            'form' => $form->createView(),
            'website' => $website,
        ));

    }


    /**
     * @Route("/issues/view-domain/{domain}/status={filter}", name="view_all_domain_issues")
     * @param Domain $domain
     * @param $filter
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewDomainIssuesAction(Domain $domain, $filter="all"){

        if (!$domain){
            throw $this->createNotFoundException('Could not load domain issues. Domain not found.');
        }

        $issues = $domain->getIssues();
        $em = $this->getDoctrine()->getManager();

        if ( $filter != "all"){

            $parameters = array(
                'domain_id' => $domain->getId(),
            );

            if ( $filter == 'open'){

                $parameters['status'] = 'open';

            }
            elseif ( $filter == 'closed' ){
                $parameters['status'] = 'closed';

            }
            elseif ( $filter == 'on hold' ){
                $parameters['status'] = 'on hold';

            }
            elseif ( $filter == 'solved' ){
                $parameters['status'] = 'solved';


            }

            $query = $em->createQuery(
                'SELECT i FROM AppBundle:Issue i WHERE i.status = :status AND i.domain = :domain_id
                 ORDER BY i.modified_at')->setParameters($parameters);
            $issues = $query->getResult();
        }


        return $this->render('issue/domain/domain-issues.html.twig', array(
            'domain' => $domain,
            'issues' => $issues,
        ));
    }


    /**
     * @Route("/issues/view-hosting/{hosting}/status={filter}", name="view_all_hosting_issues")
     * @param Hosting $hosting
     * @param string $filter
     * @return Response
     */
    public function viewHostingIssuesAction(Hosting $hosting, $filter="all"){

        if (!$hosting){
            throw $this->createNotFoundException('Could not load domain issues. Domain not found.');
        }

        $issues = $hosting->getIssues();
        $em = $this->getDoctrine()->getManager();

        if ( $filter != 'all' ){

            $parameters = array(
                'hosting_id' => $hosting->getId(),
            );

            if ( $filter == 'open'){

                $parameters['status'] = 'open';

            }
            elseif ( $filter == 'closed' ){
                $parameters['status'] = 'closed';

            }
            elseif ( $filter == 'on hold' ){
                $parameters['status'] = 'on hold';

            }
            elseif ( $filter == 'solved' ){
                $parameters['status'] = 'solved';

            }

            $query = $em->createQuery(
                'SELECT i FROM AppBundle:Issue i WHERE i.status = :status AND i.hosting = :hosting_id
                 ORDER BY i.modified_at')->setParameters($parameters);
            $issues = $query->getResult();
        }



        return $this->render('issue/hosting/hosting-issues.html.twig', array(
            'hosting' => $hosting,
            'issues' => $issues,
        ));
    }


    /**
     * @Route("/issues/view-website/{website}/status={filter}", name="view_all_website_issues")
     * @param Website $website
     * @param string $filter
     * @return Response
     * @internal param Hosting $hosting
     */
    public function viewWebsiteIssuesAction(Website $website, $filter="all"){

        if (!$website){
            throw $this->createNotFoundException('Could not load domain issues. Domain not found.');
        }

        $issues = $website->getIssues();
        $em = $this->getDoctrine()->getManager();

        if ( $filter != 'all' ){

            $parameters = array(
                'website_id' => $website->getId(),
            );

            if ( $filter == 'open'){

                $parameters['status'] = 'open';

            }
            elseif ( $filter == 'closed' ){
                $parameters['status'] = 'closed';

            }
            elseif ( $filter == 'on hold' ){
                $parameters['status'] = 'on hold';

            }
            elseif ( $filter == 'solved' ){
                $parameters['status'] = 'solved';

            }

            $query = $em->createQuery(
                'SELECT i FROM AppBundle:Issue i WHERE i.status = :status AND i.website = :website_id
                 ORDER BY i.modified_at')->setParameters($parameters);
            $issues = $query->getResult();
        }



        return $this->render('issue/website/website-issues.html.twig', array(
            'website' => $website,
            'issues' => $issues,
        ));
    }


    /**
     * @param Issue $issue
     * @Route("/issues/delete/{issue}/", name="delete_issue")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Issue $issue){

        if (!$issue){
            throw $this->createNotFoundException('Could not delete issue. Issue not found');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($issue);
        $em->flush();

        $this->addFlash('notice', 'Issue is deleted.');

        return $this->redirectToRoute('list_all_issues');
    }


    /**
     * @Route("/issue/list-all/", name="list_all_issues")
     * @return Response
     */
    public function listAction(){

        $issues = $this->getDoctrine()->getRepository('AppBundle:Issue')->findAll();

        $em = $this->getDoctrine()->getManager();

        $domain_issues_query = $em->createQuery(
            'SELECT i from AppBundle:issue i INNER JOIN AppBundle:domain d WITH i.domain = d.id'
        );

        $hosting_issues_query = $em->createQuery(
            'SELECT i from AppBundle:issue i INNER JOIN AppBundle:hosting h WITH i.hosting = h.id'
        );

        $website_issues_query = $em->createQuery(
            'SELECT i from AppBundle:issue i INNER JOIN AppBundle:website w WITH i.website = w.id'
        );

        $domain_issues = $domain_issues_query->getResult();

        $hosting_issues = $hosting_issues_query->getResult();

        $website_issues = $website_issues_query->getResult();

        return $this->render('issue/list-issues.html.twig', array(
            'issues' => $issues,
            'domain_issues' => $domain_issues,
            'hosting_issues' => $hosting_issues,
            'website_issues' => $website_issues,
        ));
    }
}
