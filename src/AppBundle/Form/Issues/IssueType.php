<?php

namespace AppBundle\Form\Issues;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IssueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $status_choices = $options['status'];

        $builder
            ->add('ticketReference', TextType::class, array('required' => false))
            ->add('status', ChoiceType::class, array(
                'choices' => $status_choices,
                'label' => 'Issue Status',
            ))
            ->add('dateCreated', DateTimeType::class, array(
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
            ))
            ->add('save', SubmitType::class)
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults( array(
            'data_class' => 'AppBundle\Entity\Issue',
            'status' => array(
                'Open' => 'Open',
                'On Hold' => 'On Hold',
                'Solved' => 'Solved',
                'Closed' => 'Closed',
            ),
        ) );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_domain_issue_type';
    }
}
