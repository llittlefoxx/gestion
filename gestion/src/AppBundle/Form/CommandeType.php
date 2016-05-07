<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codetype')
            ->add('observation')
            ->add('datecommande', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
            ->add('idligne')
            ->add('qte')
            ->add('idlignedecmd')
            ->add('quantitecommande')
            ->add('quantitebci')
            ->add('idbci')
            ->add('idunite')
            ->add('idprod')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Commande'
        ));
    }
}
