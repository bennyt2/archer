<?php

namespace Archer\MeetEntryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompetitionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('location')
            ->add('start_date')
            ->add('end_date')
            ->add('registration_start_date')
            ->add('registration_end_date')
            ->add('registration_code')
            ->add('notes')
            ->add('events_per_athlete')
            ->add('male_entries_allowed')
            ->add('female_entries_allowed')
            ->add('athletes_per_event')
            ->add('relays_per_event')
            ->add('competition_type')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Archer\MeetEntryBundle\Entity\Competition'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'archer_meetentrybundle_competition';
    }
}
