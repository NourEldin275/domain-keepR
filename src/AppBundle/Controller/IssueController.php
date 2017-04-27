<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Domain;
use AppBundle\Entity\Issue;
use AppBundle\Form\Issues\DomainIssueType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

        $form = $this->createForm(DomainIssueType::class, $issue, array(
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

        return $this->render('issue/add-domain-issue.html.twig', array(
            'form' => $form->createView(),
            'domain' => $domain,
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
}
