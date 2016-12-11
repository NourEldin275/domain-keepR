<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WebsiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $technology_choices = $options['technology_choices'];
        $status_choices = $options['status_choices'];

        $builder
            ->add('url', UrlType::class)
            ->add('websiteName', TextType::class, array('label' => 'Website Name'))
            ->add('client', EntityType::class, array(
                'class' => 'AppBundle\Entity\Client',
                'choice_label' => 'name',
            ))
            ->add('technology', ChoiceType::class, array(
                'choices' => $technology_choices,
                'label' => 'Technology',
            ))
            ->add('status', ChoiceType::class, array(
                'choices' => $status_choices,
                'label' => 'Website Status',
            ))
            ->add('save', SubmitType::class, array( 'label'=> 'Submit'))
            ->getForm();

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Website',
            'technology_choices' => null,
            'status_choices' => null,
        ));
    }

    public function getName()
    {
        return 'app_bundle_website_type';
    }
}
