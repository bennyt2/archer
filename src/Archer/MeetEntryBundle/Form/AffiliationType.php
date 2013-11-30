<?php

namespace Archer\MeetEntryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AffiliationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('mascot')
            ->add('address1')
            ->add('address2')
            ->add('city')
            ->add('state')
            ->add('affiliation_type')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Archer\MeetEntryBundle\Entity\Affiliation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'archer_meetentrybundle_affiliation';
    }
}
