<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacturefourType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numfactcni')
            ->add('numfactfour')
            ->add('datefour', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
            ->add('datecni', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
            ->add('objetfact')
            ->add('idcompte')
            ->add('idstruct')
            ->add('idpaiement')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Facturefour'
        ));
    }
}
