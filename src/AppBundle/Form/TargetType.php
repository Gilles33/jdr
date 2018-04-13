<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 01/03/18
 * Time: 12:55
 */

namespace AppBundle\Form;

use AppBundle\Entity\TestSet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TargetType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder->add('user', EntityType::class, array(
                'class' => 'AppBundle\Entity\User'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => TestSet::class,
        ));
    }


}