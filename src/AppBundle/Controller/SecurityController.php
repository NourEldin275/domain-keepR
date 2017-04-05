<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\ChangePasswordType;
use AppBundle\Form\Model\ChangePassword;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SecurityController extends Controller
{

    /**
     * @param $request
     * @Route("/login/", name="login")
     * @return Response
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }


    /**
     * @Route("/forgot-password/", name="forgot_password")
     * @param Request $request
     * @return Response
     */
    public function forgotPasswordAction(Request $request){

        $email = array('email' => '');


        $form = $this->createFormBuilder($email)
            ->add('email', EmailType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){

            $submitted_email = $form->getData()['email'];

            $user_repository = $this->getDoctrine()->getRepository('AppBundle:User');

            $user = $user_repository->findOneBy(array(
                'email' => $submitted_email
            ));

            if (!$user){ // User with matching email NOT found
                $this->addFlash('warning', $submitted_email . ' is not found!');
            }
            else{ // User with matching email found.

                $token_manager = $this->get('app.token_generator');

                $user->setPasswordToken( $token_manager->generateToken() );

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $reset_url = $this->generateUrl('reset_password', array(
                    'user' => $user->getId(),
                    'token' => $user->getPasswordToken(),
                ), UrlGeneratorInterface::ABSOLUTE_URL);

                $message = \Swift_Message::newInstance()
                    ->setSubject('Password Reset Request')
                    ->setFrom('keeper@domain-keeper.com')
                    ->setTo($user->getEmail())
                    ->setBody(
                        $this->renderView('emails/forgot-password-request.html.twig', array(
                            'url' => $reset_url
                        )), 'text/html'
                    );

                $mailer = $this->get('mailer');

                $mailer->send($message);
                $this->addFlash('notice','Check your email for the password reset link.');
                return $this->redirectToRoute('login');
            }
        }

        return $this->render('security/forgot-password.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/password-reset/{user}-{token}/", name="reset_password")
     * @param User $user
     * @param $token
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @return Response
     */
    public function resetPassword(User $user, $token, Request $request){

        if ( !$user ){
            throw $this->createNotFoundException('User not found!');
        }

        $token_manager = $this->get('app.token_generator');

        if ( !$token_manager->verifyToken($token, $user->getPasswordToken()) ){
            throw $this->createNotFoundException('Invalid Password Reset Token.');
        }



        $reset_password = array('new_password' => '');
        $passwordForm = $this->createFormBuilder($reset_password)
            ->add('new_password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'Passwords don\'t match. ',
                'required' => true,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password')
            ))
            ->add('save', SubmitType::class)
            ->getForm();

        $passwordForm->handleRequest($request);
        if ( $passwordForm->isSubmitted() && $passwordForm->isValid() ){

            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $passwordForm->getData()['new_password']);
            $user->setPassword($password);

            $user->setPasswordToken('');

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();



            $this->addFlash('notice', 'Your password was successfully reset.');

            return $this->redirectToRoute('login');
        }

        return $this->render('security/reset-password-html.twig', array(
            'form' => $passwordForm->createView(),
        ));
    }
}
