<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HostingCredentialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $scope_choices = $options['scope_choices'];

        $builder
            ->add('scope', ChoiceType::class, array(
                'choices' => $scope_choices,
                'label' => 'Credential Scope',
            ))
            ->add('url', UrlType::class)
            ->add('username', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', TextType::class)
            ->add('hosting', EntityType::class, array(
                'class' => 'AppBundle\Entity\Hosting',
                'choice_label' => 'name',
            ))
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\HostingCredential',
            'scope_choices' => array(
                'Developer' => 'Developer',
                'Client' => 'Client',
            ),
        ));
    }

    public function getName()
    {
        return 'app_bundle_hosting_credential_type';
    }
}
