<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Client;
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

        $form = $this->createFormBuilder($domain)
            ->add('domain', TextType::class)
            ->add('registrar', TextType::class)
            ->add('renewal_date', DateType::class)
            ->add('cp_url', TextType::class)
            ->add('cp_username', TextType::class)
            ->add('cp_password', TextType::class);
        // work to be completed
        
        return $this->render('/addNew/new-domain.html.twig');
    }
}
