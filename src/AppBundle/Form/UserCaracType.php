<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 19/03/18
 * Time: 13:24
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserCaracType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value',RangeType::class, array(
                'label' => false,
                'attr' => array(
                    'min' => 0,
                    'max' => 5,
                    'class' => 'range-field'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\UserCarac',
        ));
    }
}