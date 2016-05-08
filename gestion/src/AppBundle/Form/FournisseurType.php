<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raisonsociale', TextType::class, array('label' => 'Raison sociale'))
            ->add('adrfour',TextType::class, array('label' => 'Adresse fournisseur'))
            ->add('telfour', TextType::class,array('label' => 'Numero de télephone'))
            ->add('faxfour',TextType::class, array('label' => 'Fax'))
            ->add('sitewebfour', TextType::class, array('label' => 'Site web'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Fournisseur'
        ));
    }
}
