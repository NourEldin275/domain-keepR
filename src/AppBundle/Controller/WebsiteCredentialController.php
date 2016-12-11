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
     * @Route("/websites/add-new-credential/", name="add_new_website_credential")
     * @Security("has_role('ROLE_DEV')")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request){

        $credential = new WebsiteCredential();

        $scope_choices = array(
            'Developer' => 'Developer',
            'Client' => 'Client',
            'Support' => 'Support',
            'Dummy' => 'Dummy',
        );

        $environment_choices = array(
            'Live' => 'Live',
            'Development' => 'Development',
            'Testing' => 'Testing',
        );

        $form = $this->createForm(WebsiteCredentialType::class, $credential, array(
            'environment_choices' => $environment_choices,
            'scope_choices' => $scope_choices,
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
}
