<?php

namespace AppBundle\Controller;

use AppBundle\Entity\HostingCredential;
use AppBundle\Form\HostingCredentialType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class HostingCredentialController extends Controller
{

    /**
     * @var array
     * Declaring Hosting Credential Scope; who is it for eg. Developers, Client...etc
     */
    private $scope = array(
        'Developer' => 'Developer',
        'Client' => 'Client',
    );

    /**
     * @param Request $request
     * @Route("/hosting/add-new-credential/", name="add_new_hosting_credential")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function newAction(Request $request)
    {
        $credential = new HostingCredential();

        $form = $this->createForm(HostingCredentialType::class, $credential, array(
            'scope_choices' => $this->scope,
        ));

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($credential);
            $em->flush();

            $this->addFlash('notice', 'Credential added successfully!');

            return $this->redirectToRoute('view_hosting', array(
               'hosting' => $credential->getHosting()->getId(),
            ));
        }

        return $this->render('hosting/credential/add-hosting-credential.html.twig', array(
            'form' => $form->createView(),
        ));

    }


    /**
     * @param Request $request
     * @param HostingCredential $credential
     * @return Response
     * @Route("/hosting/edit-credential/{credential}/", name="edit_hosting_credential")
     * @Security("has_role('ROLE_DEV')")
     */
    public function editAction(Request $request, HostingCredential $credential)
    {
        if ( !$credential ){
            throw $this->createNotFoundException('Hosting Credential Not Found!');
        }

        $form = $this->createForm(HostingCredentialType::class, $credential, array(
            'scope_choices' => $this->scope,
        ));

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($credential);
            $em->flush();

            $this->addFlash('notice', 'Credential saved successfully!');

            return $this->redirectToRoute('view_hosting', array(
               'hosting' => $credential->getHosting()->getId(),
            ));
        }

        return $this->render('hosting/credential/edit-hosting-credential.html.twig', array(
            'form' => $form->createView(),
            'hosting' => $credential->getHosting(),
        ));

    }


    /**
     * @param HostingCredential $credential
     * @Route("/hosting/delete-credential/{credential}/", name="delete_hosting_credential")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function deleteAction(HostingCredential $credential){

        if ( !$credential ){
            throw $this->createNotFoundException('Credential Not found');
        }

        $hosting = $credential->getHosting();

        $em = $this->getDoctrine()->getManager();
        $em->remove($credential);
        $em->flush();

        $this->addFlash('notice', 'Hosting credential deleted successfully!');

        return $this->redirectToRoute('view_hosting', array(
            'hosting' => $hosting->getId(),
        ));

    }
}
