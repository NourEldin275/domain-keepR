<?php

namespace AppBundle\Controller;

use AppBundle\Entity\WebsiteCredential;
use AppBundle\Form\WebsiteCredentialType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class WebsiteCredentialController extends Controller
{
    /**
     * @var array
     * declaring credential scope; who is it for
     */
    private $scope_choices = array(
        'Developer' => 'Developer',
        'Client' => 'Client',
        'Support' => 'Support',
        'Dummy' => 'Dummy',
    );

    /**
     * @var array
     * declaring environment types; what the environment is used for
     */
    private $environment_choices = array(
        'Live' => 'Live',
        'Development' => 'Development',
        'Testing' => 'Testing',
    );

    /**
     * @Route("/websites/add-new-credential/", name="add_new_website_credential")
     * @Security("has_role('ROLE_DEV')")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request){

        $credential = new WebsiteCredential();

        $form = $this->createForm(WebsiteCredentialType::class, $credential, array(
            'environment_choices' => $this->environment_choices,
            'scope_choices' => $this->scope_choices,
        ));

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($credential);
            $em->flush();

            $this->addFlash('notice', 'Credential has been added successfully');
            return $this->redirectToRoute('view_website', array(
                'id' => $credential->getWebsite()->getId(),
            ));
        }

        return $this->render('website/credential/add-website-credential.html.twig', array('form' => $form->createView()));

    }

    /**
     * @param Request $request
     * @param $id
     * @Route("/edit-website-credential/{id}/", name="edit_website_credential", requirements={"id": "\d+"})
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function editAction(Request $request, $id){

        $credential = $this->getDoctrine()->getRepository('AppBundle:WebsiteCredential')->find($id);

        if ( !$credential ){
            throw $this->createNotFoundException('Credential does not exist');
        }

        $form = $this->createForm(WebsiteCredentialType::class, $credential, array(
            'environment_choices' => $this->environment_choices,
            'scope_choices' => $this->scope_choices,
        ));

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){

            $em = $this->getDoctrine()->getManager();
            $em->persist($credential);
            $em->flush();

            $this->addFlash('notice', 'Credential has been successfully updated');

            return $this->redirectToRoute('view_website', array(
                'id' => $credential->getWebsite()->getId(),
            ));
        }

        return $this->render('website/credential/edit-website-credential.html.twig', array('form' => $form->createView()  ));

    }


    /**
     * @param WebsiteCredential $credential
     * @Route("/delete-website-credential/{credential}/", name="delete_website_credential")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function deleteAction(WebsiteCredential $credential){

        if  ( !$credential ){
            throw $this->createNotFoundException('Credential does not exist');
        }

        $website_id = $credential->getWebsite()->getId();

        $em = $this->getDoctrine()->getManager();
        $em->remove($credential);
        $em->flush();

        $this->addFlash('notice', 'Credential deleted');

        return $this->redirectToRoute('view_website', array(
            'id' => $website_id,
        ));
    }
}
