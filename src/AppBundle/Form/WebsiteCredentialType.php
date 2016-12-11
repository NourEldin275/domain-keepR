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

class WebsiteCredentialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $scope_choices = $options['scope_choices'];
        $environment_choices = $options['environment_choices'];

        $builder
            ->add('scope', ChoiceType::class, array(
                'choices' => $scope_choices,
                'label' => 'Credential Scope',
            ))
            ->add('environment', ChoiceType::class, array(
                'choices' => $environment_choices,
                'label' => 'Environment',
            ))
            ->add('loginUrl', UrlType::class, array('label' => 'Login URL' ))
            ->add('username', TextType::class)
            ->add('password', TextType::class, array('label' => 'Login Password'))
            ->add('email', EmailType::class, array('label' => 'Email'))
            ->add('ftpIp', TextType::class, array(
                'label' => 'FTP Address',
                'required' => false,
            ))
            ->add('ftpUsername', TextType::class, array(
                'label' => 'FTP Username',
                'required' => false,
            ))
            ->add('ftpPassword', TextType::class, array(
                'label' => 'FTP Password',
                'required' => false,
            ))
            ->add('website', EntityType::class, array(
                'class' => 'AppBundle\Entity\Website',
                'choice_label' => 'websiteName',
            ))
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\WebsiteCredential',
            'scope_choices' => null,
            'environment_choices' => null,
        ));
    }

    public function getName()
    {
        return 'app_bundle_website_credential_type';
    }
}
