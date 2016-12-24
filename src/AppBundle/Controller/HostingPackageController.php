<?php

namespace AppBundle\Controller;

use AppBundle\Entity\HostingPackage;
use AppBundle\Form\HostingPackageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HostingPackageController extends Controller
{

    /**
     * @param Request $request
     * @Route("/hosting/add-new-package/", name="add_new_hosting_package")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function newAction(Request $request)
    {
        $package = new HostingPackage();

        $form = $this->createForm(HostingPackageType::class, $package);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($package);
            $em->flush();

            $this->addFlash('notice', 'Package Added Successfully');

            return $this->redirectToRoute('list_all_hosting_packages');
        }

        return $this->render('hosting/package/add-package.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/hosting/packages/", name="list_all_hosting_packages")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function listAction(){

        $packages = $this->getDoctrine()->getRepository('AppBundle:HostingPackage')->findAll();

        return $this->render('hosting/package/packages.html.twig', array(
            'packages' => $packages,
        ));
    }


    /**
     * @param Request $request
     * @param HostingPackage $package
     * @Route("/hosting/edit-package/{package}/", name="edit_hosting_package")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function editAction(Request $request, HostingPackage $package){

        if ( !$package ){
            throw $this->createNotFoundException('Package not found');
        }

        $form = $this->createForm(HostingPackageType::class, $package);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){

            $em = $this->getDoctrine()->getManager();
            $em->persist($package);
            $em->flush();

            $this->addFlash('notice', 'Package saved successfully!');

            return $this->redirectToRoute('list_all_hosting_packages');
        }

        return $this->render('hosting/package/edit-package.html.twig', array(
            'form' => $form->createView(),
            'package' => $package,
        ));
    }


    /**
     * @param HostingPackage $package
     * @Route("/hosting/delete-package/{package}/", name="delete_hosting_package")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function deleteAction(HostingPackage $package){

        if ( !$package ){
            throw $this->createNotFoundException('Package not found!');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($package);
        $em->flush();

        $this->addFlash('notice', 'Package deleted successfully');

        return $this->redirectToRoute('list_all_hosting_packages');

    }
}
