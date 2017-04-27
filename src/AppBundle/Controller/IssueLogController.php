<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Issue;
use AppBundle\Entity\IssueLog;
use AppBundle\Form\Issues\IssueLogType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IssueLogController extends Controller
{
    /**
     * @Route("/issue/log/{issue}/", name="add_issue_log")
     * @param Issue $issue
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Issue $issue, Request $request)
    {
        if (!$issue){
            throw $this->createNotFoundException('Could not load log. Issue not found');
        }

        $new_log = new IssueLog();
        $new_log->setIssue($issue);


        $form = $this->createForm(IssueLogType::class, $new_log);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){

            $issue->addLog($new_log);
            $em = $this->getDoctrine()->getManager();

            $em->persist($new_log);
            $issue->updateModifiedDatetime();
            $em->flush();

            $this->addFlash('notice', 'Log is saved successfully.');
            return $this->redirectToRoute('add_issue_log', array('issue' => $issue->getId()));

        }

        return $this->render('issue/log/add-log.html.twig', array(
            'form' => $form->createView(),
            'issue' => $issue,
        ));
    }


    /**
     * @Route("/issue/delete-log-{log}/", name="delete_issue_log")
     * @param IssueLog $log
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteLog(IssueLog $log){

        if (!$log){
            throw $this->createNotFoundException('Requested log could not be found to be deleted.');
        }

        $issue = $log->getIssue();

        $em = $this->getDoctrine()->getManager();
        $em->remove($log);
        $em->flush();

        $this->addFlash('notice', 'Log is deleted.');

        return $this->redirectToRoute('add_issue_log', array(
            'issue' => $issue->getId(),
        ));
    }
}
