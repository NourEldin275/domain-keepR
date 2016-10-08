<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller
{
    /**
     * @param $request
     * @Route("/", name="homepage")
     * @return Response
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need

        $session  = $request->getSession();
        $is_logged = $session->get('is_logged_in');

        if ( $is_logged ){
            // redirect to controller to display dashboard
            $this->redirect($this->dashboardAction());
        }

        return $this->render('security/login.html.twig');
    }

    /**
     * @Route ("/dashboard/", name="dashboard")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function dashboardAction(){
        return $this->render('dashboard.html.twig');
    }

}
