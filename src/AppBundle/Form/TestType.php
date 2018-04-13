<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 01/03/18
 * Time: 12:55
 */

namespace AppBundle\Form;

use AppBundle\Entity\Test;
use AppBundle\Form\TargetType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('initiator', TestSetType::class, array(
            'label' => false,
        ))
                ->add('defendant', TargetType::class, array(
                    'label' => false
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'lancer le test'
                ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Test::class,
            'character' => null
        ));
    }


}