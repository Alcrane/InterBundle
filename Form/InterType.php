<?php

namespace ALC\InterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numInter','integer', array('label' => 'Numéro d\'intervention'))
            ->add('dtOuverture','date', array('label' => 'Date d\'ouverture'))
            ->add('dtCloture','date', array(
                'label' => 'Date de Clôture',
                'required' => false
                    ))
            ->add('nbrjours', 'integer', array(
                'label' => 'Nombre de jours',
                'required' => false
                    ))
            ->add('libinter', 'textarea', array('label' => 'Libellé'))
            ->add('comment', 'textarea', array(
                'label' => 'Commentaire',
                'required' => false
                    ))
            ->add('attribInter')
            ->add('cdeTech', 'integer')
            ->add('nomUtil', 'text', array('label' => 'Nom utilisateur'))
            ->add('prenomUtil', 'text', array('label' => 'Prénom utilisateur'))
            ->add('encours', 'checkbox', array(
                'label' => 'Inter en cours',
                'required' => false
                    ))
            ->add('save', 'submit')
            ->add('Annuler', 'reset')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ALC\InterBundle\Entity\Inter'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alc_interbundle_inter';
    }
}
