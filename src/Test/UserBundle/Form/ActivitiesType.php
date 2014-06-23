<?php

namespace Test\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActivitiesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type',                         'text')
            ->add('name',                          'text')
            ->add('maxusers',                      'text')
            ->add('description',                   'text')
            ->add('file1',                         'text')
            ->add('file2',                         'text')
            ->add('file3',                         'text')
            ->add('file4',                         'text')
            ->add('file5',                         'text')
            ->add('datestartinscription',          'date')
            ->add('dateendinscription',            'date')
            ->add('datestartactivity',             'date')
            ->add('dateendactivity',               'date')
            ->add('groupminusers',                 'integer')
            ->add('groupmaxusers',                 'integer')
            ->add('modules', 'entity',    array('class'         => 'UserBundle:Modules',
                                                'property'   => 'name',
                                                'multiple'   => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\UserBundle\Entity\Activities'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test_userbundle_activities';
    }
}
