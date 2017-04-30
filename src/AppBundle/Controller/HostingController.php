<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Hosting;
use AppBundle\Form\HostingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HostingController extends Controller
{
    /**
     * @param Request $request
     * @Route("/add-new-hosting/", name="add_new_hosting")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function newAction(Request $request)
    {
        $hosting = new Hosting();

        $form = $this->createForm(HostingType::class, $hosting);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($hosting);
            $em->flush();

            $this->addFlash('notice', 'hosting added successfully!');

            return $this->redirectToRoute('list_all_hosting');
        }

        return $this->render('hosting/add-hosting.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/hosts/", name="list_all_hosting")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function listAction(){

        $hosts = $this->getDoctrine()->getRepository('AppBundle:Hosting')->findAll();

        return $this->render('hosting/hosts.html.twig', array(
            'hosts' => $hosts,
        ));

    }


    /**
     * @param Hosting $hosting
     * @Route("/view-hosting/{hosting}/", name="view_hosting")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function viewAction(Hosting $hosting){

        if ( !$hosting ){
            throw $this->createNotFoundException("hosting Not found!");
        }

        return $this->render('hosting/view-hosting.html.twig', array(
            'hosting' => $hosting,
        ));

    }


    /**
     * @param Hosting $hosting
     * @Route("/delete-hosting/{hosting}/", name="delete_hosting")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function deleteAction(Hosting $hosting){

        if ( !$hosting ){
            throw $this->createNotFoundException("hosting Not found!");
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($hosting);
        $em->flush();

        $this->addFlash('notice', 'hosting deleted successfully!');

        return $this->redirectToRoute('list_all_hosting');

    }


    /**
     * @param Request $request
     * @param Hosting $hosting
     * @return Response
     * @Route("/edit-hosting/{hosting}/", name="edit_hosting")
     * @Security("has_role('ROLE_DEV')")
     */
    public function editAction(Request $request, Hosting $hosting)
    {

        $form = $this->createForm(HostingType::class, $hosting);

        $form->remove('domain');

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($hosting);
            $em->flush();

            $this->addFlash('notice', 'hosting saved successfully!');

            return $this->redirectToRoute('view_hosting', array(
                'hosting' => $hosting->getId(),
            ));
        }

        return $this->render('hosting/edit-hosting.html.twig', array(
            'form' => $form->createView(),
            'hosting' => $hosting,
        ));
    }
}
