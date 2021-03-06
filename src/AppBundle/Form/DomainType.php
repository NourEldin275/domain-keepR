<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DomainType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$client_choices = $options['client_choices'];
        //$hosting_choices = $options['hosting_choices'];

        
        $builder
            ->add('domain', TextType::class)
            ->add('registrar', EntityType::class, array(
                'class' => 'AppBundle\Entity\Registrar',
                'choice_label' => 'name',
                'label' => 'Registrar',
            ))
            ->add('renewal_date', DateType::class, array('widget' => 'single_text'))
           // ->add('hosting_package', ChoiceType::class, array('choices' => $hosting_choices, 'label' => 'hosting Package'))
            ->add('client', EntityType::class, array ('class' => 'AppBundle\Entity\Client', 'choice_label' => 'name'))//ChoiceType::class, array('choices' => $client_choices, 'label' => 'Choose a client', 'mapped' => false))
            ->add('notification_status', CheckboxType::class, array('label' => 'Enable Notifications', 'required' => false))
            ->add('auto_renew', CheckboxType::class, array('label' => 'Enable Auto Renew', 'required' => false))
            ->add('save', SubmitType::class, array('label' => 'Add domain'))
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults( array(
            'data_class' => 'AppBundle\Entity\Domain',
            //'hosting_choices' => null,
            //'client_choices' => null,
        ) );
    }

    public function getName()
    {
        return 'app_bundle_domain_type';
    }
}
