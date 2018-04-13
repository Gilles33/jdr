<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 27/02/18
 * Time: 13:34
 */

namespace AppBundle\Form;


use AppBundle\Entity\UserCarac;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CaracteristicsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('magic', IntegerType::class, array(
            'label' => 'Magie'
        ))
            ->add('spirit', IntegerType::class, array(
                'label' => 'Esprit'
            ))
            ->add('resistance', IntegerType::class, array(
                'label' => 'Résistance'
            ))
            ->add('psy', IntegerType::class, array(
                'label' => 'Psy'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => UserCarac::class,
        ));
    }

}