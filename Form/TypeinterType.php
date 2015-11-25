<?php

namespace ALC\InterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TypeinterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libtyp')
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
            'data_class' => 'ALC\InterBundle\Entity\Typeinter'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alc_interbundle_typeinter';
    }
}
