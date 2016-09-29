<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Appbundle\Entity\Domain;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddDomainController extends Controller
{
    /**
     * @Route ("/add-new-domain", name="add_new_domain")
     */
    public function newAction(Request $request)
    {
        $domain = new Domain();
        $domain->setDomain("oba7.com");
        
        return $this->render('new-domain.html.twig');
    }
}
