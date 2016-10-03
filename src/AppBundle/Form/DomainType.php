<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DomainType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$clients = $this->get('doctrine')->getRepository('AppBundle:Client')->findAll();

        $builder
            ->add('domain', TextType::class)
            ->add('registrar', TextType::class)
            ->add('renewal_date', DateType::class)
            ->add('cp_url', TextType::class)
            ->add('cp_username', TextType::class)
            ->add('cp_password', TextType::class)
            ->add('client', ChoiceType::class, array('choices' => $clients, 'label' => 'Choose a client'))
            ->add('save', SubmitType::class, array('label' => 'Add domain'))
            ->getForm();*/
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults( array( 'data_class' => 'AppBundle\Entity\Domain') );
    }

    public function getName()
    {
        return 'app_bundle_domain_type';
    }
}
