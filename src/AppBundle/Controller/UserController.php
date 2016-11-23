<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Role\Role;

class UserController extends Controller
{
    /**
     * @param $request
     * @Route("/register-user/", name="user_registration")
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function registerAction(Request $request)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $role = $form->get('user_roles')->getData();
            $user->setRoles(array($role));

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('list_users');
        }

        return $this->render(
            'user/register.html.twig',
            array('form' => $form->createView())
        );
    }


    /**
     * @Route("/users/", name="list_users")
     * @Security("has_role('ROLE_ADMIN')")
     * @return Response
     */
    public function listUsersAction(){
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        return $this->render('user/users.html.twig', array('users' => $users));
    }


    /**
     * @param $id
     * @param Request $request
     * @internal param $Request
     *
     * @Route("/edit-user/{id}/", name="edit_user", requirements={"id": "\d+"})
     * @Security("has_role('ROLE_ADMIN')")
     * @return Response
     */
    public function editAction($id, Request $request){

        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        $user_role = $user->getRoles();
        $user_role = $user_role[0];

        if ( $user_role != 'ROLE_SUPER' ){

            $form = $this->createForm(UserType::class, $user);


            $form->handleRequest($request);
            if ( $form->isSubmitted() && $form->isValid() ){
                $em = $this->getDoctrine()->getManager();

                $password = $this->get('security.password_encoder')
                    ->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);
                $role = $form->get('user_roles')->getData();
                $user->setRoles(array($role));


                $em->persist($user);
                $em->flush();
                $this->addFlash('notice', 'user saved successfully');
            }
            return $this->render('user/edit-user.html.twig', array('form' => $form->createView(), 'user' => $user, 'role' => $user_role));
        }
        $this->addFlash('warning', 'Super user edit form is yet to be built');
        return $this->redirectToRoute('list_users');
    }


    /**
     * @param $id
     * @param Request $request
     * @Route("/delete-user/{id}/", name="delete_user", requirements={"id": "\d+"})
     * @Security("has_role('ROLE_ADMIN')")
     * @return Response
     */
    public function deleteAction($id, Request $request){

        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);

        if (!$user){
            $this->createNotFoundException('User not found');
        }

        if ( $user->getRoles()[0] != 'ROLE_SUPER' ){
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
            $this->addFlash('notice','Selected user was deleted!');
            return $this->redirectToRoute('list_users');
        }

        $this->addFlash('warning', 'Can not delete Super user!');
        return $this->redirectToRoute('list_users');
    }
}