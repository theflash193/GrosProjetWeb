<?php

namespace Test\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ModulesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',                           'text')
            ->add('maxusers'                        'integer')
            ->add('description'                     'text')
            ->add('datestartinscription'            'date')
            ->add('dateendinscription'              'date')
            ->add('datestartmodule'                 'date')
            ->add('dateendmodule'                   'date')
            ->add('credits'                         'integer')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\UserBundle\Entity\Modules'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test_userbundle_modules';
    }
}
