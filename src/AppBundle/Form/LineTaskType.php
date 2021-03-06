<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LineTaskType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('apellido');
        $builder->add('products','collection', array(
                    'type'         => new ProductType(),
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'prototype_name' => '__prod__',

                ))
            

        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\LineTask'
        ));
    }

    public function getName()
    {
        return 'linetask';
    }


}
