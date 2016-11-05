<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;

class DomainController extends FOSRestController
{
    /**
     * @Get("/api/domains/")
     */
    public function getAction()
    {
        $rest_result = $this->getDoctrine()->getRepository('AppBundle:Domain')->findAll();
        if ( $rest_result == null ){
            return new View("No domains found", Response::HTTP_NOT_FOUND);
        }

        return $rest_result;

    }
}
