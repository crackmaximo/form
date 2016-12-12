<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder->add('name');
       
        $builder->add('linetasks', 'collection', array(
            'type'         => new LineTaskType(),
            'allow_add'    => true,
            'allow_delete' => true,
            'by_reference' => false,
            
            
           
        ));
       $builder->add('submit', 'submit');
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task',
        ));
    }

    public function getName()
    {
        return 'task';
    }


}
