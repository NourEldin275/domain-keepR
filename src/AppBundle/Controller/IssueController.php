<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Domain;
use AppBundle\Entity\Hosting;
use AppBundle\Entity\Issue;
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
        if ( $filter == 'open'){

            $parameters = array(
                'status' => 'open',
                'domain_id' => $domain->getId(),
            );

            $query = $em->createQuery(
                'SELECT i FROM AppBundle:Issue i WHERE i.status = :status AND i.domain = :domain_id
                 ORDER BY i.modified_at')->setParameters($parameters);
            $issues = $query->getResult();
        }
        elseif ( $filter == 'closed' ){
            $parameters = array(
                'status' => 'closed',
                'domain_id' => $domain->getId(),
            );

            $query = $em->createQuery(
                'SELECT i FROM AppBundle:Issue i WHERE i.status = :status AND i.domain = :domain_id
                 ORDER BY i.modified_at')->setParameters($parameters);
            $issues = $query->getResult();
        }
        elseif ( $filter == 'on hold' ){
            $parameters = array(
                'status' => 'on hold',
                'domain_id' => $domain->getId(),
            );

            $query = $em->createQuery(
                'SELECT i FROM AppBundle:Issue i WHERE i.status = :status AND i.domain = :domain_id
                 ORDER BY i.modified_at')->setParameters($parameters);
            $issues = $query->getResult();
        }
        elseif ( $filter == 'solved' ){
            $parameters = array(
                'status' => 'solved',
                'domain_id' => $domain->getId(),
            );

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
        if ( $filter == 'open'){

            $parameters = array(
                'status' => 'open',
                'hosting_id' => $hosting->getId(),
            );

            $query = $em->createQuery(
                'SELECT i FROM AppBundle:Issue i WHERE i.status = :status AND i.hosting = :hosting_id
                 ORDER BY i.modified_at')->setParameters($parameters);
            $issues = $query->getResult();
        }
        elseif ( $filter == 'closed' ){
            $parameters = array(
                'status' => 'closed',
                'hosting_id' => $hosting->getId(),
            );

            $query = $em->createQuery(
                'SELECT i FROM AppBundle:Issue i WHERE i.status = :status AND i.hosting = :hosting_id
                 ORDER BY i.modified_at')->setParameters($parameters);
            $issues = $query->getResult();
        }
        elseif ( $filter == 'on hold' ){
            $parameters = array(
                'status' => 'on hold',
                'hosting_id' => $hosting->getId(),
            );

            $query = $em->createQuery(
                'SELECT i FROM AppBundle:Issue i WHERE i.status = :status AND i.hosting = :hosting_id
                 ORDER BY i.modified_at')->setParameters($parameters);
            $issues = $query->getResult();
        }
        elseif ( $filter == 'solved' ){
            $parameters = array(
                'status' => 'solved',
                'hosting_id' => $hosting->getId(),
            );

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
            'SELECT i from AppBundle:issue i WHERE i.domain IS NOT NULL'
        );

        $hosting_issues_query = $em->createQuery(
            'SELECT i from AppBundle:issue i WHERE i.hosting IS NOT NULL'
        );

        $domain_issues = $domain_issues_query->getResult();

        $hosting_issues = $hosting_issues_query->getResult();

        return $this->render('issue/list-issues.html.twig', array(
            'issues' => $issues,
            'domain_issues' => $domain_issues,
            'hosting_issues' => $hosting_issues,
        ));
    }
}
