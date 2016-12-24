<?php

namespace AppBundle\Form;

use AppBundle\Entity\Domain;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HostingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domain', EntityType::class, array(
                'class' => 'AppBundle\Entity\Domain',
                'choice_label' => 'domain',
                'query_builder' => function (EntityRepository $er) { // getting only domains who have not assigned a hosting
                    return $er->createQueryBuilder('d')
                        ->leftJoin('d.hosting', 'h')
                        ->where('h.id is NULL');
                },
            ))
            ->add('status', CheckboxType::class, array(
                'label' => 'Active',
                'required' => false,
                ))
            ->add('renewalDate', DateType::class, array(
                'widget' => 'single_text'
            ))->add('creationDate', DateType::class, array(
                'widget' => 'single_text'
            ))
//            ->add('client', EntityType::class, array(
//                'class' => 'AppBundle\Entity\Client',
//                'choice_label' => 'name',
//            ))
            ->add('package', EntityType::class, array(
                'class' => 'AppBundle\Entity\HostingPackage',
                'choice_label' => 'name',
            ))
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Hosting',
        ));
    }

    public function getName()
    {
        return 'app_bundle_hosting_type';
    }
}
