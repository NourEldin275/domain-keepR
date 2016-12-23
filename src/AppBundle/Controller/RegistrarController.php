<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Registrar;
use AppBundle\Form\RegistrarType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class RegistrarController extends Controller
{
    /**
     * @param Request $request
     * @Route("/add-new-registrar/", name="add_new_registrar")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function newAction(Request $request)
    {
        $registrar = new Registrar();

        $form = $this->createForm(RegistrarType::class, $registrar);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($registrar);
            $em->flush();

            $this->addFlash('notice', 'Registrar added successfully');

            return $this->redirectToRoute('list_all_registrars');
        }

        return $this->render('registrar/add-registrar.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/registrars/", name="list_all_registrars")
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function listAction(){

        $registrars = $this->getDoctrine()->getRepository('AppBundle:Registrar')->findAll();

        return $this->render('registrar/registrars.html.twig', array('registrars' => $registrars));

    }


    /**
     * @param Registrar $registrar
     * @Route("/delete-registrar/{registrar}/", name="delete_registrar")
     * @Security("has_role('ROLE_DEV')")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Registrar $registrar){

        if ( !$registrar ){
            throw $this->createNotFoundException("Registrar Not found");
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($registrar);
        $em->flush();

        $this->addFlash('notice', 'Registrar deleted!');

        return $this->redirectToRoute('list_all_registrars');
    }


    /**
     * @param Request $request
     * @param $id
     * @Route("/edit-registrar/{id}/", name="edit_registrar", requirements={"id": "\d+"})
     * @Security("has_role('ROLE_DEV')")
     * @return Response
     */
    public function editAction(Request $request, $id){

        $registrar = $this->getDoctrine()->getRepository('AppBundle:Registrar')->find($id);

        if ( !$registrar ){
            throw $this->createNotFoundException("Registrar Not found");
        }

        $form = $this->createForm(RegistrarType::class, $registrar);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($registrar);
            $em->flush();

            $this->addFlash("notice", "Registrar saved successfully");
            return $this->redirectToRoute('list_all_registrars');
        }

        return $this->render('registrar/edit-registrar.html.twig', array(
            'form' => $form->createView(),
            'registrar' => $registrar,
        ));

    }
}
