<?php

namespace Archer\MeetEntryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Archer\MeetEntryBundle\Form\DataTransformer\StringToArrayTransformer;

class CompetitionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new StringToArrayTransformer();
        $builder
            ->add('name')
            ->add('location')
            ->add('start_date', 'datetime', array(
              'date_widget'=>'single_text',
              'time_widget'=>'single_text'
            ))
            ->add('end_date', 'datetime', array(
              'date_widget'=>'single_text',
              'time_widget'=>'single_text'
            ))
            ->add('registration_start_date', 'datetime', array(
              'date_widget'=>'single_text',
              'time_widget'=>'single_text'
            ))
            ->add('registration_end_date', 'datetime', array(
              'date_widget'=>'single_text',
              'time_widget'=>'single_text'
            ))
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
